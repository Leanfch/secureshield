<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Bienvenido, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Estás conectado a SecureShield, tu plataforma de seguridad antivirus.</p>
                </div>
            </div>

            @if(!Auth::user()->isAdmin())
                <!-- Current Subscription Status -->
                @php
                    $activeSubscription = Auth::user()->activeSubscription;
                @endphp

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Estado de tu Suscripción</h3>

                        @if($activeSubscription)
                            <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h4 class="text-2xl font-bold text-blue-900">{{ $activeSubscription->plan->name }}</h4>
                                        <p class="text-blue-700">Suscripción activa</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-3xl font-bold text-blue-900">${{ number_format($activeSubscription->plan->price, 0, ',', '.') }}</p>
                                        <p class="text-sm text-blue-700">por mes</p>
                                    </div>
                                </div>

                                <div class="border-t border-blue-200 pt-4 mb-4">
                                    <p class="text-sm text-blue-700">Próxima renovación: <span class="font-bold">{{ $activeSubscription->end_date ? $activeSubscription->end_date->format('d/m/Y') : 'N/A' }}</span></p>
                                </div>

                                <a href="{{ route('user.subscription.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                    Ver Detalles de Suscripción
                                </a>
                            </div>
                        @else
                            <div class="bg-gray-50 border-2 border-gray-200 rounded-lg p-6 text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">No tienes una suscripción activa</h4>
                                <p class="text-gray-600 mb-4">Protege tus dispositivos con uno de nuestros planes</p>
                                <a href="{{ route('plans.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                    Ver Planes Disponibles
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Accesos Rápidos</h3>
                        <div class="grid md:grid-cols-3 gap-4">
                            <a href="{{ route('user.subscription.index') }}" class="block p-4 bg-blue-50 hover:bg-blue-100 rounded-lg text-center transition">
                                <svg class="w-12 h-12 text-blue-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h4 class="font-bold text-gray-900">Mi Suscripción</h4>
                                <p class="text-sm text-gray-600">Gestiona tu plan</p>
                            </a>

                            <a href="{{ route('plans.index') }}" class="block p-4 bg-green-50 hover:bg-green-100 rounded-lg text-center transition">
                                <svg class="w-12 h-12 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <h4 class="font-bold text-gray-900">Ver Planes</h4>
                                <p class="text-sm text-gray-600">Explora opciones</p>
                            </a>

                            <a href="{{ route('blog.index') }}" class="block p-4 bg-purple-50 hover:bg-purple-100 rounded-lg text-center transition">
                                <svg class="w-12 h-12 text-purple-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                <h4 class="font-bold text-gray-900">Blog</h4>
                                <p class="text-sm text-gray-600">Noticias y consejos</p>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Admin Quick Access -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Panel de Administración</h3>
                        <p class="text-gray-600 mb-4">Accede al panel de administración para gestionar el sitio</p>
                        <a href="{{ route('admin.dashboard') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            Ir al Panel de Administración
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
