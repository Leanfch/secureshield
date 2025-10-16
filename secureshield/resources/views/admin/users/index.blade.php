<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios y Suscripciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Total de Usuarios: {{ $users->total() }}</h3>
                    </div>

                    <div class="space-y-6">
                        @forelse($users as $user)
                        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                            <!-- User Header -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-500 text-white rounded-full h-12 w-12 flex items-center justify-center font-bold text-lg mr-4">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900">{{ $user->name }}</h4>
                                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-gray-500">Registrado el</span>
                                    <p class="text-sm font-medium text-gray-900">{{ $user->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>

                            <!-- Subscriptions -->
                            <div class="border-t border-gray-200 pt-4">
                                <h5 class="text-sm font-bold text-gray-700 mb-3">Suscripciones:</h5>

                                @if($user->subscriptions->count() > 0)
                                    <div class="space-y-3">
                                        @foreach($user->subscriptions as $subscription)
                                        <div class="bg-gray-50 rounded-lg p-4 flex items-center justify-between">
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
                            <div class="border-t border-gray-200 pt-4 mt-4">
                                <h5 class="text-sm font-bold text-gray-700 mb-3">Historial de Pagos ({{ $user->payments->count() }}):</h5>
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
                            <div class="border-t border-gray-200 pt-4 mt-4">
                                <div class="grid grid-cols-3 gap-4 text-center">
                                    <div>
                                        <p class="text-2xl font-bold text-blue-600">{{ $user->subscriptions->count() }}</p>
                                        <p class="text-xs text-gray-600">Suscripciones</p>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold text-green-600">{{ $user->payments->where('status', 'approved')->count() }}</p>
                                        <p class="text-xs text-gray-600">Pagos Aprobados</p>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold text-purple-600">
                                            ${{ number_format($user->payments->where('status', 'approved')->sum('amount'), 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-gray-600">Total Facturado</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
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
