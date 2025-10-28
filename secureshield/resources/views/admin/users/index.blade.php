<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios y Suscripciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Header -->
            <div class="mb-8">
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 overflow-hidden shadow-2xl rounded-2xl">
                    <div class="p-8 text-white">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-blue-100 text-sm font-medium mb-1">Total de Usuarios Registrados</p>
                                <p class="text-5xl font-extrabold">{{ $users->total() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-2xl rounded-2xl border border-blue-100">
                <div class="p-8">

                    <div class="space-y-6">
                        @forelse($users as $user)
                        <div class="border-2 border-blue-100 rounded-2xl p-6 hover:shadow-xl hover:border-blue-300 transition-all bg-gradient-to-br from-white to-blue-50/30">
                            <!-- User Header -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-full h-14 w-14 flex items-center justify-center font-bold text-xl mr-4 shadow-lg">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold text-gray-900">{{ $user->name }}</h4>
                                        <p class="text-sm text-gray-600 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right bg-white rounded-lg px-4 py-2 shadow-sm border border-blue-100">
                                    <span class="text-xs text-gray-500 flex items-center justify-end gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Registrado el
                                    </span>
                                    <p class="text-sm font-bold text-gray-900">{{ $user->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>

                            <!-- Subscriptions -->
                            <div class="border-t-2 border-blue-100 pt-4">
                                <h5 class="text-sm font-bold text-blue-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Suscripciones:
                                </h5>

                                @if($user->subscriptions->count() > 0)
                                    <div class="space-y-3">
                                        @foreach($user->subscriptions as $subscription)
                                        <div class="bg-gradient-to-r from-blue-50 to-white rounded-xl p-4 flex items-center justify-between border border-blue-200 shadow-sm">
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <span class="text-lg font-bold text-blue-600">{{ $subscription->plan->name }}</span>
                                                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                        {{ $subscription->status === 'active' ? 'bg-green-100 text-green-800' :
                                                           ($subscription->status === 'cancelled' ? 'bg-red-100 text-red-800' :
                                                           'bg-gray-100 text-gray-800') }}">
                                                        {{ ucfirst($subscription->status) }}
                                                    </span>
                                                </div>
                                                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                                                    <div>
                                                        <span class="font-medium">Inicio:</span>
                                                        {{ $subscription->start_date->format('d/m/Y') }}
                                                    </div>
                                                    <div>
                                                        <span class="font-medium">Fin:</span>
                                                        {{ $subscription->end_date ? $subscription->end_date->format('d/m/Y') : 'N/A' }}
                                                    </div>
                                                    <div>
                                                        <span class="font-medium">Precio:</span>
                                                        ${{ number_format($subscription->plan->price, 0, ',', '.') }}/mes
                                                    </div>
                                                    <div>
                                                        <span class="font-medium">Dispositivos:</span>
                                                        {{ $subscription->plan->devices_limit >= 999 ? 'Ilimitados' : $subscription->plan->devices_limit }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-500 italic">Sin suscripciones activas</p>
                                @endif
                            </div>

                            <!-- Payment History -->
                            @if($user->payments->count() > 0)
                            <div class="border-t-2 border-blue-100 pt-4 mt-4">
                                <h5 class="text-sm font-bold text-blue-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Historial de Pagos ({{ $user->payments->count() }}):
                                </h5>
                                <div class="space-y-2">
                                    @foreach($user->payments->take(3) as $payment)
                                    <div class="flex items-center justify-between text-sm">
                                        <div>
                                            <span class="font-medium">${{ number_format($payment->amount, 0, ',', '.') }}</span>
                                            <span class="text-gray-500">- {{ $payment->created_at->format('d/m/Y') }}</span>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            {{ $payment->status === 'approved' ? 'bg-green-100 text-green-800' :
                                               ($payment->status === 'rejected' ? 'bg-red-100 text-red-800' :
                                               'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </div>
                                    @endforeach
                                    @if($user->payments->count() > 3)
                                    <p class="text-xs text-gray-500 italic">+ {{ $user->payments->count() - 3 }} pagos más</p>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <!-- User Stats -->
                            <div class="border-t-2 border-blue-100 pt-4 mt-4">
                                <div class="grid grid-cols-3 gap-4 text-center">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200">
                                        <p class="text-3xl font-extrabold text-blue-600">{{ $user->subscriptions->count() }}</p>
                                        <p class="text-xs text-gray-700 font-semibold mt-1">Suscripciones</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                                        <p class="text-3xl font-extrabold text-green-600">{{ $user->payments->where('status', 'approved')->count() }}</p>
                                        <p class="text-xs text-gray-700 font-semibold mt-1">Pagos Aprobados</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200">
                                        <p class="text-2xl font-extrabold text-purple-600">
                                            ${{ number_format($user->payments->where('status', 'approved')->sum('amount'), 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-gray-700 font-semibold mt-1">Total Facturado</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">No hay usuarios registrados</h3>
                            <p class="text-gray-600">Los usuarios registrados aparecerán aquí.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
