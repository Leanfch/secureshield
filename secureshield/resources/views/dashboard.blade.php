<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 overflow-hidden shadow-2xl rounded-2xl">
                <div class="p-8 text-white">
                    <div class="flex items-start gap-6">
                        <div class="hidden md:block">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold mb-2">¡Bienvenido, {{ Auth::user()->name }}!</h3>
                            <p class="text-blue-100 text-lg">Estás conectado a SecureShield, tu plataforma de seguridad antivirus profesional.</p>
                        </div>
                    </div>
                </div>
            </div>

            @if(!Auth::user()->isAdmin())
                <!-- Current Subscription Status -->
                @php
                    $activeSubscription = Auth::user()->activeSubscription;
                @endphp

                <div class="bg-white overflow-hidden shadow-xl rounded-2xl border-2 border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Estado de tu Suscripción</h3>
                        </div>

                        @if($activeSubscription)
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 border-2 border-blue-300 rounded-2xl p-8 shadow-lg">
                                <div class="flex items-center justify-between mb-6">
                                    <div>
                                        <div class="inline-block px-4 py-1 bg-green-500 text-white text-sm font-bold rounded-full mb-3">
                                            ✓ Activa
                                        </div>
                                        <h4 class="text-3xl font-bold text-blue-900 mb-1">{{ $activeSubscription->plan->name }}</h4>
                                        <p class="text-blue-700 text-sm">Plan de protección activo</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">${{ number_format($activeSubscription->plan->price, 0, ',', '.') }}</p>
                                        <p class="text-sm text-blue-700 font-medium">por mes</p>
                                    </div>
                                </div>

                                <div class="border-t border-blue-300 pt-6 mb-6 grid md:grid-cols-2 gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-blue-700 font-medium">Próxima renovación</p>
                                            <p class="font-bold text-blue-900">{{ $activeSubscription->end_date ? $activeSubscription->end_date->format('d/m/Y') : 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-blue-700 font-medium">Dispositivos protegidos</p>
                                            <p class="font-bold text-blue-900">{{ $activeSubscription->plan->devices_limit >= 999 ? 'Ilimitados' : $activeSubscription->plan->devices_limit }}</p>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('user.subscription.index') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Ver Detalles de Suscripción
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-300 rounded-2xl p-8 text-center">
                                <div class="w-20 h-20 bg-gradient-to-br from-gray-400 to-gray-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-900 mb-2">No tienes una suscripción activa</h4>
                                <p class="text-gray-600 mb-6">Protege tus dispositivos con SecureShield y mantén tu mundo digital seguro</p>
                                <a href="{{ route('plans.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Ver Planes Disponibles
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-xl rounded-2xl border-2 border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Accesos Rápidos</h3>
                        </div>
                        <div class="grid md:grid-cols-3 gap-6">
                            <a href="{{ route('user.subscription.index') }}" class="group block p-6 bg-gradient-to-br from-blue-50 to-blue-100/50 hover:from-blue-100 hover:to-blue-200/50 rounded-2xl text-center transition transform hover:-translate-y-1 shadow-lg hover:shadow-xl border-2 border-blue-200">
                                <div class="w-16 h-16 bg-blue-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">Mi Suscripción</h4>
                                <p class="text-sm text-blue-700">Gestiona tu plan</p>
                            </a>

                            <a href="{{ route('plans.index') }}" class="group block p-6 bg-gradient-to-br from-green-50 to-green-100/50 hover:from-green-100 hover:to-green-200/50 rounded-2xl text-center transition transform hover:-translate-y-1 shadow-lg hover:shadow-xl border-2 border-green-200">
                                <div class="w-16 h-16 bg-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">Ver Planes</h4>
                                <p class="text-sm text-green-700">Explora opciones</p>
                            </a>

                            <a href="{{ route('blog.index') }}" class="group block p-6 bg-gradient-to-br from-purple-50 to-purple-100/50 hover:from-purple-100 hover:to-purple-200/50 rounded-2xl text-center transition transform hover:-translate-y-1 shadow-lg hover:shadow-xl border-2 border-purple-200">
                                <div class="w-16 h-16 bg-purple-600 rounded-xl mx-auto mb-4 flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">Blog</h4>
                                <p class="text-sm text-purple-700">Noticias y consejos</p>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Admin Quick Access -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 overflow-hidden shadow-xl rounded-2xl border-2 border-orange-300">
                    <div class="p-8">
                        <div class="flex items-start gap-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-700 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Panel de Administración</h3>
                                <p class="text-orange-800 mb-6">Gestiona usuarios, posts y toda la configuración del sitio web de SecureShield</p>
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                    Ir al Panel de Administración
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
