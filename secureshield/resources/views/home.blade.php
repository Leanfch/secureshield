<x-public-layout>
    <x-slot name="title">SecureShield - Protección Antivirus Profesional</x-slot>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-24 px-4 overflow-hidden" aria-labelledby="hero-heading">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-950 -z-10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMyNTYzZWIiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAtMjBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-10 -z-10"></div>

        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <article class="text-white">
                    <p class="inline-block mb-6">
                        <span class="bg-blue-500/20 text-blue-200 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm border border-blue-400/30">
                            🛡️ Protección Certificada 2025
                        </span>
                    </p>
                    <h1 id="hero-heading" class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                        Protección <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200">Total</span> Para Tu Mundo Digital
                    </h1>
                    <p class="text-xl md:text-2xl mb-10 text-blue-100 leading-relaxed">
                        SecureShield te ofrece la mejor protección antivirus del mercado. Mantén tus dispositivos seguros contra malware, ransomware y amenazas cibernéticas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-5">
                        <a href="{{ route('plans.index') }}" class="group bg-white text-blue-900 px-10 py-5 rounded-xl font-bold text-lg hover:bg-blue-50 transition-all duration-200 text-center shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1">
                            <span class="flex items-center justify-center gap-2">
                                Ver Planes
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                        <a href="{{ route('blog.index') }}" class="group border-2 border-white/50 text-white px-10 py-5 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-900 transition-all duration-200 text-center backdrop-blur-sm transform hover:-translate-y-1">
                            Aprender Más
                        </a>
                    </div>

                    <!-- Stats -->
                    <aside class="grid grid-cols-3 gap-6 mt-12 pt-12 border-t border-blue-700/50" aria-label="Estadísticas clave">
                        <div class="text-center">
                            <data value="10000000" class="text-3xl font-bold text-white mb-1">10M+</data>
                            <p class="text-sm text-blue-200">Usuarios Activos</p>
                        </div>
                        <div class="text-center">
                            <data value="99.9" class="text-3xl font-bold text-white mb-1">99.9%</data>
                            <p class="text-sm text-blue-200">Detección</p>
                        </div>
                        <div class="text-center">
                            <data value="24" class="text-3xl font-bold text-white mb-1">24/7</data>
                            <p class="text-sm text-blue-200">Soporte</p>
                        </div>
                    </aside>
                </article>
                <figure class="flex justify-center relative">
                    <div class="absolute inset-0 bg-blue-500 rounded-full blur-3xl opacity-20 animate-pulse" aria-hidden="true"></div>
                    <img src="{{ asset('assets/secureshield-logo.svg') }}" alt="Logotipo de SecureShield - Escudo de protección con candado" class="relative w-64 h-64 md:w-80 md:h-80 drop-shadow-2xl animate-float">
                </figure>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 px-4 bg-gradient-to-b from-white to-blue-50" aria-labelledby="features-heading">
        <div class="max-w-7xl mx-auto">
            <header class="text-center mb-20">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider mb-4 block">Características Premium</span>
                <h2 id="features-heading" class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">¿Por qué elegir <span class="text-blue-600">SecureShield</span>?</h2>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto">Protección completa para todos tus dispositivos con tecnología de última generación</p>
            </header>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <article class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Protección en Tiempo Real</h3>
                    <p class="text-slate-600 leading-relaxed">Detección instantánea de amenazas antes de que puedan dañar tus dispositivos.</p>
                </article>

                <!-- Feature 2 -->
                <article class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Backup en la Nube</h3>
                    <p class="text-slate-600 leading-relaxed">Mantén tus archivos importantes seguros con copias de seguridad automáticas.</p>
                </article>

                <!-- Feature 3 -->
                <article class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Rendimiento Optimizado</h3>
                    <p class="text-slate-600 leading-relaxed">Protección potente sin ralentizar tu equipo. Escaneos rápidos y eficientes.</p>
                </article>

                <!-- Feature 4 -->
                <article class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">VPN Integrada</h3>
                    <p class="text-slate-600 leading-relaxed">Navega de forma anónima y segura con nuestra VPN incluida en planes Premium.</p>
                </article>

                <!-- Feature 5 -->
                <article class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Multi-Dispositivo</h3>
                    <p class="text-slate-600 leading-relaxed">Protege todos tus dispositivos: PC, Mac, tablets y smartphones.</p>
                </article>

                <!-- Feature 6 -->
                <article class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Soporte 24/7</h3>
                    <p class="text-slate-600 leading-relaxed">Nuestro equipo de expertos está disponible para ayudarte en cualquier momento.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24 px-4 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-950 -z-10"></div>
        <div class="absolute inset-0 opacity-10 -z-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMyNTYzZWIiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAtMjBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')]"></div>

        <div class="max-w-5xl mx-auto text-center text-white relative">
            <div class="inline-block mb-6">
                <span class="bg-blue-500/20 text-blue-200 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm border border-blue-400/30">
                    ⚡ Oferta Especial
                </span>
            </div>
            <h2 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">¿Listo para proteger tus dispositivos?</h2>
            <p class="text-xl md:text-2xl mb-12 text-blue-100">Únete a <span class="font-bold text-white">más de 10 millones</span> de usuarios que confían en SecureShield para su seguridad digital.</p>

            <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <a href="{{ route('plans.index') }}" class="group inline-flex items-center gap-3 bg-white text-blue-900 px-12 py-5 rounded-xl font-bold text-xl hover:bg-blue-50 transition-all duration-200 shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1">
                    Ver Planes y Precios
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <span class="text-blue-200 text-sm">✓ Prueba gratis por 30 días • Sin tarjeta de crédito</span>
            </div>
        </div>
    </section>
</x-public-layout>
