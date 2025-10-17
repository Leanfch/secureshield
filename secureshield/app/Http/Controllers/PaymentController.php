<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Exceptions\MPApiException;

/**
 * Controller for handling MercadoPago payment processing.
 * Manages checkout creation, payment success, failure, and webhook notifications.
 */
class PaymentController extends Controller
{
    /**
     * Initialize MercadoPago SDK with access token.
     *
     * @return void
     */
    private function initializeMercadoPago(): void
    {
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
    }

    /**
     * Create a payment preference and redirect to MercadoPago checkout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPreference(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
        ]);

        $plan = Plan::findOrFail($request->plan_id);
        $user = Auth::user();

        // Handle free plan without MercadoPago
        if ($plan->price == 0) {
            // Cancel current active subscription if exists
            $currentSubscription = $user->activeSubscription;
            if ($currentSubscription) {
                $currentSubscription->update([
                    'status' => 'cancelled',
                    'end_date' => now(),
                ]);
            }

            // Create new free subscription
            $newSubscription = Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'start_date' => now(),
                'end_date' => now()->addYear(), // Free plan lasts 1 year
            ]);

            // Create free payment record
            Payment::create([
                'user_id' => $user->id,
                'subscription_id' => $newSubscription->id,
                'amount' => 0,
                'currency' => 'ARS',
                'payment_method' => 'free',
                'status' => 'approved',
                'description' => 'Activación de plan gratuito ' . $plan->name,
            ]);

            return redirect()->route('user.subscription.index')
                ->with('success', '¡Plan gratuito activado! Tu suscripción al plan ' . $plan->name . ' está activa.');
        }

        try {
            $this->initializeMercadoPago();

            // Create preference client
            $client = new PreferenceClient();

            // Build absolute URLs using route() helper - ensures proper URL generation
            $successUrl = route('payment.success', [], true);
            $failureUrl = route('payment.failure', [], true);
            $pendingUrl = route('payment.pending', [], true);

            // Debug: Log URLs being sent
            Log::info('MercadoPago URLs', [
                'success' => $successUrl,
                'failure' => $failureUrl,
                'pending' => $pendingUrl,
            ]);

            // Prepare request data
            $requestData = [
                'items' => [
                    [
                        'title' => 'SecureShield - ' . $plan->name,
                        'description' => 'Suscripción mensual al plan ' . $plan->name,
                        'quantity' => 1,
                        'currency_id' => 'ARS',
                        'unit_price' => (float) $plan->price,
                    ]
                ],
                'payer' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'back_urls' => [
                    'success' => $successUrl,
                    'failure' => $failureUrl,
                    'pending' => $pendingUrl,
                ],
                'external_reference' => $user->id . '-' . $plan->id . '-' . time(),
            ];

            Log::info('MercadoPago Request Data', $requestData);

            // Create preference
            $preference = $client->create($requestData);

            // Create pending payment record (subscription will be created after payment approval)
            $payment = Payment::create([
                'user_id' => $user->id,
                'subscription_id' => null, // Will be updated after payment is approved
                'amount' => $plan->price,
                'currency' => 'ARS',
                'mp_preference_id' => $preference->id,
                'status' => 'pending',
                'description' => 'Pago de suscripción al plan ' . $plan->name,
            ]);

            // Store plan_id in session for later use
            session(['pending_plan_id' => $plan->id]);
            session(['pending_payment_id' => $payment->id]);

            // Redirect to MercadoPago checkout
            return redirect($preference->init_point);

        } catch (MPApiException $e) {
            Log::error('MercadoPago API Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Error al crear la preferencia de pago. Por favor, inténtalo de nuevo.');
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    /**
     * Force approve pending payments (for testing)
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceApprovePending()
    {
        $user = Auth::user();

        // Find pending payments for this user
        $pendingPayments = Payment::where('user_id', $user->id)
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($pendingPayments as $payment) {
            $payment->update(['status' => 'approved']);
            Log::info('Payment force approved', ['payment_id' => $payment->id]);
        }

        return redirect()->route('payment.sync')
            ->with('info', 'Pagos actualizados a aprobados. Sincronizando...');
    }

    /**
     * Sync pending payments and create subscriptions
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function syncPendingPayments()
    {
        $user = Auth::user();

        // Find approved payments without subscription
        $approvedPayments = Payment::where('user_id', $user->id)
            ->where('status', 'approved')
            ->whereNull('subscription_id')
            ->orderBy('created_at', 'desc')
            ->get();

        // Debug: Show what we found
        Log::info('Sync attempt', [
            'user_id' => $user->id,
            'approved_payments_count' => $approvedPayments->count(),
            'payments' => $approvedPayments->toArray(),
        ]);

        $syncedCount = 0;

        foreach ($approvedPayments as $payment) {
            $plan = null;

            // Try multiple methods to find the plan

            // Method 1: Extract from description using regex "Pago de suscripción al plan PlanName"
            if (preg_match('/plan\s+(\w+)/i', $payment->description, $matches)) {
                $planName = $matches[1];
                $plan = Plan::where('name', $planName)->first();
            }

            // Method 2: Match by amount (if multiple plans have same price, get the first)
            if (!$plan) {
                $plan = Plan::where('price', $payment->amount)->first();
            }

            // Method 3: Get most expensive plan if payment amount is high
            if (!$plan && $payment->amount > 5000) {
                $plan = Plan::where('price', '<=', $payment->amount)
                    ->orderBy('price', 'desc')
                    ->first();
            }

            if ($plan) {
                // Cancel current active subscription
                $currentSubscription = $user->activeSubscription;
                if ($currentSubscription) {
                    $currentSubscription->update([
                        'status' => 'cancelled',
                        'end_date' => now(),
                    ]);
                }

                // Create new subscription
                $newSubscription = Subscription::create([
                    'user_id' => $user->id,
                    'plan_id' => $plan->id,
                    'status' => 'active',
                    'start_date' => now(),
                    'end_date' => now()->addMonth(),
                ]);

                // Update payment
                $payment->update(['subscription_id' => $newSubscription->id]);
                $syncedCount++;

                Log::info('Subscription synced', [
                    'user_id' => $user->id,
                    'payment_id' => $payment->id,
                    'plan_id' => $plan->id,
                    'subscription_id' => $newSubscription->id,
                ]);
            } else {
                Log::warning('Could not find plan for payment', [
                    'payment_id' => $payment->id,
                    'amount' => $payment->amount,
                    'description' => $payment->description,
                ]);
            }
        }

        if ($syncedCount > 0) {
            return redirect()->route('user.subscription.index')
                ->with('success', "Se sincronizaron {$syncedCount} suscripción(es) correctamente.");
        } else {
            return redirect()->route('user.subscription.index')
                ->with('info', 'No hay pagos pendientes para sincronizar.');
        }
    }

    /**
     * Handle successful payment callback.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function success(Request $request)
    {
        // Log all query parameters for debugging
        Log::info('Payment Success Callback', [
            'all_params' => $request->all(),
            'query_params' => $request->query(),
            'user_id' => Auth::id(),
        ]);

        $paymentId = $request->query('payment_id');
        $preferenceId = $request->query('preference_id');
        $status = $request->query('status');

        if ($paymentId && $status === 'approved') {
            $payment = Payment::where('mp_preference_id', $preferenceId)->first();

            if ($payment) {
                $payment->update([
                    'mp_payment_id' => $paymentId,
                    'status' => 'approved',
                    'payment_method' => $request->query('payment_type'),
                ]);

                // Create or update subscription
                $planId = session('pending_plan_id');
                if ($planId) {
                    $plan = Plan::find($planId);
                    $user = Auth::user();

                    // Cancel current active subscription if exists
                    $currentSubscription = $user->activeSubscription;
                    if ($currentSubscription) {
                        $currentSubscription->update([
                            'status' => 'cancelled',
                            'end_date' => now(),
                        ]);
                    }

                    // Create new subscription
                    $newSubscription = Subscription::create([
                        'user_id' => $user->id,
                        'plan_id' => $plan->id,
                        'status' => 'active',
                        'start_date' => now(),
                        'end_date' => now()->addMonth(),
                    ]);

                    // Update payment with new subscription_id
                    $payment->update(['subscription_id' => $newSubscription->id]);

                    // Clear session
                    session()->forget(['pending_plan_id', 'pending_payment_id']);

                    return redirect()->route('user.subscription.index')
                        ->with('success', '¡Pago aprobado! Tu suscripción al plan ' . $plan->name . ' está activa.');
                }
            }
        }

        return redirect()->route('user.subscription.index')
            ->with('success', 'Pago procesado correctamente.');
    }

    /**
     * Handle failed payment callback.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function failure(Request $request)
    {
        $preferenceId = $request->query('preference_id');

        if ($preferenceId) {
            $payment = Payment::where('mp_preference_id', $preferenceId)->first();
            if ($payment) {
                $payment->update(['status' => 'rejected']);
            }
        }

        session()->forget(['pending_plan_id', 'pending_payment_id']);

        return redirect()->route('plans.index')
            ->with('error', 'El pago fue rechazado. Por favor, intenta nuevamente con otro medio de pago.');
    }

    /**
     * Handle pending payment callback.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pending(Request $request)
    {
        $paymentId = $request->query('payment_id');
        $preferenceId = $request->query('preference_id');

        if ($preferenceId) {
            $payment = Payment::where('mp_preference_id', $preferenceId)->first();
            if ($payment && $paymentId) {
                $payment->update([
                    'mp_payment_id' => $paymentId,
                    'status' => 'pending',
                ]);
            }
        }

        return redirect()->route('user.subscription.index')
            ->with('info', 'Tu pago está pendiente de aprobación. Te notificaremos cuando sea procesado.');
    }

    /**
     * Handle MercadoPago webhook notifications.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function webhook(Request $request)
    {
        try {
            $type = $request->input('type');
            $data = $request->input('data');

            Log::info('MercadoPago Webhook received', [
                'type' => $type,
                'data' => $data,
            ]);

            // Only process payment notifications
            if ($type === 'payment') {
                $paymentId = $data['id'] ?? null;

                if ($paymentId) {
                    $this->initializeMercadoPago();

                    // Get payment details from MercadoPago API
                    $client = new \MercadoPago\Client\Payment\PaymentClient();
                    $mpPayment = $client->get($paymentId);

                    // Find payment in database
                    $payment = Payment::where('mp_payment_id', $paymentId)->first();

                    if ($payment) {
                        // Update payment status
                        $payment->update([
                            'status' => $mpPayment->status,
                            'payment_method' => $mpPayment->payment_type_id ?? null,
                        ]);

                        // If approved, activate subscription
                        if ($mpPayment->status === 'approved' && $payment->subscription_id) {
                            $subscription = Subscription::find($payment->subscription_id);
                            if ($subscription) {
                                $subscription->update(['status' => 'active']);
                            }
                        }

                        // If rejected or cancelled, update subscription
                        if (in_array($mpPayment->status, ['rejected', 'cancelled']) && $payment->subscription_id) {
                            $subscription = Subscription::find($payment->subscription_id);
                            if ($subscription) {
                                $subscription->update(['status' => 'cancelled']);
                            }
                        }
                    }
                }
            }

            return response()->json(['status' => 'success'], 200);

        } catch (\Exception $e) {
            Log::error('Webhook Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
