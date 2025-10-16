<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureShield - Protección Antivirus Profesional</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/secureshield-logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield" class="h-10">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Inicio</a>
                    <a href="{{ route('plans.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Planes</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Blog</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Registrarse</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Protección Total Para Tu Mundo Digital
                    </h1>
                    <p class="text-xl mb-8 text-blue-100">
                        SecureShield te ofrece la mejor protección antivirus del mercado. Mantén tus dispositivos seguros contra malware, ransomware y amenazas cibernéticas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('plans.index') }}" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition text-center">
                            Ver Planes
                        </a>
                        <a href="{{ route('blog.index') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition text-center">
                            Aprender Más
                        </a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('assets/secureshield-logo.svg') }}" alt="SecureShield Logo" class="w-48 h-48 md:w-56 md:h-56 drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">¿Por qué elegir SecureShield?</h2>
                <p class="text-xl text-gray-700">Protección completa para todos tus dispositivos</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl hover:shadow-xl transition border border-gray-200">
                    <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Protección en Tiempo Real</h3>
                    <p class="text-gray-700">Detección instantánea de amenazas antes de que puedan dañar tus dispositivos.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl hover:shadow-xl transition border border-gray-200">
                    <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Backup en la Nube</h3>
                    <p class="text-gray-700">Mantén tus archivos importantes seguros con copias de seguridad automáticas.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl hover:shadow-xl transition border border-gray-200">
                    <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Rendimiento Optimizado</h3>
                    <p class="text-gray-700">Protección potente sin ralentizar tu equipo. Escaneos rápidos y eficientes.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-8 rounded-xl hover:shadow-xl transition border border-gray-200">
                    <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">VPN Integrada</h3>
                    <p class="text-gray-700">Navega de forma anónima y segura con nuestra VPN incluida en planes Premium.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-8 rounded-xl hover:shadow-xl transition border border-gray-200">
                    <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Multi-Dispositivo</h3>
                    <p class="text-gray-700">Protege todos tus dispositivos: PC, Mac, tablets y smartphones.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-8 rounded-xl hover:shadow-xl transition border border-gray-200">
                    <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Soporte 24/7</h3>
                    <p class="text-gray-700">Nuestro equipo de expertos está disponible para ayudarte en cualquier momento.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">¿Listo para proteger tus dispositivos?</h2>
            <p class="text-xl mb-8 text-blue-100">Únete a miles de usuarios que confían en SecureShield para su seguridad digital.</p>
            <a href="{{ route('plans.index') }}" class="inline-block bg-white text-blue-600 px-10 py-4 rounded-lg font-bold text-xl hover:bg-blue-50 transition">
                Ver Planes y Precios
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield" class="h-10 mb-4 brightness-0 invert">
                    <p class="text-gray-400">Protección antivirus profesional para todos tus dispositivos.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Producto</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('plans.index') }}" class="hover:text-white transition">Planes</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Cuenta</h4>
                    <ul class="space-y-2 text-gray-400">
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-white transition">Iniciar Sesión</a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-white transition">Registrarse</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Legal</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Términos de Servicio</a></li>
                        <li><a href="#" class="hover:text-white transition">Política de Privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} SecureShield. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
