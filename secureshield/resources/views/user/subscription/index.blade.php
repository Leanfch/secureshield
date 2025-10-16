<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Suscripción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Current Subscription -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Plan Actual</h3>

                    @if($activeSubscription)
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-8 border-2 border-blue-200">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h4 class="text-3xl font-bold text-blue-900">{{ $activeSubscription->plan->name }}</h4>
                                    <p class="text-blue-700 mt-2">{{ $activeSubscription->plan->description }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-4xl font-bold text-blue-900">${{ number_format($activeSubscription->plan->price, 0, ',', '.') }}</p>
                                    <p class="text-sm text-blue-700">por mes</p>
                                </div>
                            </div>

                            <!-- Plan Features -->
                            <div class="grid md:grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center text-blue-900">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $activeSubscription->plan->devices_limit >= 999 ? 'Dispositivos ilimitados' : $activeSubscription->plan->devices_limit . ' dispositivos' }}
                                </div>
                                <div class="flex items-center text-blue-900">
                                    @if($activeSubscription->plan->real_time_protection)
                                        <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Protección en tiempo real
                                    @else
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        Sin protección en tiempo real
                                    @endif
                                </div>
                                <div class="flex items-center text-blue-900">
                                    @if($activeSubscription->plan->cloud_backup)
                                        <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Backup en la nube
                                    @else
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        Sin backup en la nube
                                    @endif
                                </div>
                                <div class="flex items-center text-blue-900">
                                    @if($activeSubscription->plan->vpn_included)
                                        <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        VPN incluida
                                    @else
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        Sin VPN
                                    @endif
                                </div>
                            </div>

                            <!-- Subscription Info -->
                            <div class="border-t border-blue-200 pt-4">
                                <div class="grid md:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <p class="text-blue-700 font-medium">Fecha de inicio</p>
                                        <p class="text-blue-900 font-bold">{{ $activeSubscription->start_date->format('d/m/Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-blue-700 font-medium">Próxima renovación</p>
                                        <p class="text-blue-900 font-bold">{{ $activeSubscription->end_date ? $activeSubscription->end_date->format('d/m/Y') : 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-blue-700 font-medium">Estado</p>
                                        <span class="inline-block px-3 py-1 bg-green-500 text-white text-xs font-bold rounded-full">
                                            {{ ucfirst($activeSubscription->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Cancel Button -->
                            <div class="mt-6">
                                <form action="{{ route('user.subscription.cancel') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar tu suscripción?');">
                                    @csrf
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded">
                                        Cancelar Suscripción
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12 bg-gray-50 rounded-lg">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">No tienes una suscripción activa</h3>
                            <p class="text-gray-600 mb-6">Elige un plan para comenzar a proteger tus dispositivos</p>
                            <a href="{{ route('plans.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg">
                                Ver Planes Disponibles
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Change Plan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Cambiar de Plan</h3>

                    <form action="{{ route('user.subscription.change') }}" method="POST">
                        @csrf
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($allPlans as $plan)
                            <label class="cursor-pointer">
                                <input type="radio" name="plan_id" value="{{ $plan->id }}" class="hidden peer"
                                    {{ $activeSubscription && $activeSubscription->plan_id === $plan->id ? 'disabled' : '' }}>
                                <div class="border-2 rounded-lg p-4 peer-checked:border-blue-600 peer-checked:bg-blue-50
                                    {{ $activeSubscription && $activeSubscription->plan_id === $plan->id ? 'opacity-50 cursor-not-allowed' : 'hover:border-blue-300' }}">
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $plan->name }}</h4>
                                    <p class="text-3xl font-bold text-blue-600 mb-2">${{ number_format($plan->price, 0, ',', '.') }}</p>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($plan->description, 50) }}</p>
                                    @if($activeSubscription && $activeSubscription->plan_id === $plan->id)
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full font-bold">Plan Actual</span>
                                    @endif
                                </div>
                            </label>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg">
                                Cambiar Plan
                            </button>
                            <p class="text-sm text-gray-600 mt-2">
                                * El cambio de plan será efectivo inmediatamente. Tu plan actual será cancelado y se activará el nuevo plan.
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Payment History -->
            @if($payments->count() > 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Historial de Pagos</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Monto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($payments as $payment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $payment->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $payment->subscription->plan->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                        ${{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $payment->status === 'approved' ? 'bg-green-100 text-green-800' :
                                               ($payment->status === 'rejected' ? 'bg-red-100 text-red-800' :
                                               'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            <!-- Subscription History -->
            @if($subscriptionHistory->count() > 1)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Historial de Suscripciones</h3>

                    <div class="space-y-4">
                        @foreach($subscriptionHistory as $subscription)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-bold text-gray-900">{{ $subscription->plan->name }}</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ $subscription->start_date->format('d/m/Y') }} -
                                        {{ $subscription->end_date ? $subscription->end_date->format('d/m/Y') : 'Actual' }}
                                    </p>
                                </div>
                                <span class="px-3 py-1 text-xs font-bold rounded-full
                                    {{ $subscription->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
