<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * UserSubscriptionController
 *
 * Handles user subscription management
 */
class UserSubscriptionController extends Controller
{
    /**
     * Display user's subscription information.
     *
     * @return View
     */
    public function index(): View
    {
        $user = auth()->user();
        $activeSubscription = $user->activeSubscription;
        $allPlans = Plan::where('is_active', true)->get();
        $subscriptionHistory = $user->subscriptions()->with('plan')->orderBy('created_at', 'desc')->get();
        $payments = $user->payments()->with('subscription.plan')->orderBy('created_at', 'desc')->get();

        return view('user.subscription.index', compact('activeSubscription', 'allPlans', 'subscriptionHistory', 'payments'));
    }

    /**
     * Change user's subscription plan.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePlan(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'plan_id' => 'required|exists:plans,id',
        ]);

        $user = auth()->user();
        $newPlan = Plan::findOrFail($validated['plan_id']);

        // Cancel current subscription if exists
        $currentSubscription = $user->activeSubscription;
        if ($currentSubscription) {
            $currentSubscription->update([
                'status' => 'cancelled',
                'end_date' => now(),
            ]);
        }

        // Create new subscription
        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $newPlan->id,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            'status' => 'active',
        ]);

        return redirect()->route('user.subscription.index')->with('success', 'Plan cambiado exitosamente a ' . $newPlan->name);
    }

    /**
     * Cancel user's subscription.
     *
     * @return RedirectResponse
     */
    public function cancel(): RedirectResponse
    {
        $user = auth()->user();
        $activeSubscription = $user->activeSubscription;

        if (!$activeSubscription) {
            return redirect()->route('user.subscription.index')->with('error', 'No tienes una suscripción activa.');
        }

        $activeSubscription->update([
            'status' => 'cancelled',
            'end_date' => now(),
        ]);

        return redirect()->route('user.subscription.index')->with('success', 'Suscripción cancelada exitosamente.');
    }
}
