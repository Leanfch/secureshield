<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureShield - Protección Antivirus Profesional</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/secureshield-logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-50">
    <!-- Header with Navigation -->
    <header class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center group" aria-label="SecureShield Home">
                        <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield Logo" class="h-12 transition-transform group-hover:scale-105">
                    </a>
                </div>
                <ul class="hidden md:flex items-center space-x-8">
                    <li><a href="{{ route('home') }}" class="text-blue-900 font-semibold border-b-2 border-blue-600 pb-1 transition" aria-current="page">Inicio</a></li>
                    <li><a href="{{ route('plans.index') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Planes</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Blog</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Iniciar Sesión</a></li>
                        <li><a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 font-semibold">Registrarse</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
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
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Backup en la Nube</h3>
                    <p class="text-slate-600 leading-relaxed">Mantén tus archivos importantes seguros con copias de seguridad automáticas.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Rendimiento Optimizado</h3>
                    <p class="text-slate-600 leading-relaxed">Protección potente sin ralentizar tu equipo. Escaneos rápidos y eficientes.</p>
                </div>

                <!-- Feature 4 -->
                <div class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">VPN Integrada</h3>
                    <p class="text-slate-600 leading-relaxed">Navega de forma anónima y segura con nuestra VPN incluida en planes Premium.</p>
                </div>

                <!-- Feature 5 -->
                <div class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Multi-Dispositivo</h3>
                    <p class="text-slate-600 leading-relaxed">Protege todos tus dispositivos: PC, Mac, tablets y smartphones.</p>
                </div>

                <!-- Feature 6 -->
                <div class="group bg-white p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-blue-500/50">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Soporte 24/7</h3>
                    <p class="text-slate-600 leading-relaxed">Nuestro equipo de expertos está disponible para ayudarte en cualquier momento.</p>
                </div>
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

    <!-- Footer -->
    <footer class="bg-slate-950 text-white py-16 px-4 border-t border-blue-900/20">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-10 mb-12">
                <div>
                    <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield" class="h-12 mb-6 brightness-0 invert">
                    <p class="text-slate-400 leading-relaxed mb-4">Protección antivirus profesional para todos tus dispositivos.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-blue-600/20 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-600/20 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-600/20 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.441 16.892c-2.102.144-6.784.144-8.883 0C5.282 16.736 5.017 15.622 5 12c.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0C18.718 7.264 18.982 8.378 19 12c-.018 3.629-.285 4.736-2.559 4.892zM10 9.658l4.917 2.338L10 14.342V9.658z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg text-white">Producto</h4>
                    <ul class="space-y-3 text-slate-400">
                        <li><a href="{{ route('plans.index') }}" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Planes
                        </a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Blog
                        </a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg text-white">Cuenta</h4>
                    <ul class="space-y-3 text-slate-400">
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Dashboard
                            </a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Iniciar Sesión
                            </a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Registrarse
                            </a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg text-white">Legal</h4>
                    <ul class="space-y-3 text-slate-400">
                        <li><a href="#" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Términos de Servicio
                        </a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Política de Privacidad
                        </a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-400 text-sm">&copy; {{ date('Y') }} SecureShield. Todos los derechos reservados.</p>
                <div class="flex items-center gap-2 text-slate-500 text-sm">
                    <span>Hecho con</span>
                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                    </svg>
                    <span>para tu seguridad</span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
