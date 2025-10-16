<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes - SecureShield</title>
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
                    <a href="{{ route('plans.index') }}" class="text-blue-600 font-bold">Planes</a>
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

    <!-- Header Section -->
    <section class="pt-32 pb-12 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Elige el Plan Perfecto para Ti</h1>
            <p class="text-xl text-blue-100">Protección profesional para todos tus dispositivos</p>
        </div>
    </section>

    <!-- Plans Section -->
    <section class="py-16 px-4 -mt-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($plans as $plan)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 {{ $plan->name === 'Premium' ? 'ring-4 ring-blue-500' : '' }}">
                    @if($plan->name === 'Premium')
                    <div class="bg-blue-600 text-white text-center py-2 font-bold text-sm">
                        MÁS POPULAR
                    </div>
                    @endif

                    <div class="p-8">
                        <!-- Plan Name -->
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $plan->name }}</h3>

                        <!-- Price -->
                        <div class="mb-6">
                            @if($plan->price == 0)
                                <span class="text-4xl font-bold text-gray-900">Gratis</span>
                            @else
                                <span class="text-4xl font-bold text-gray-900">${{ number_format($plan->price, 0, ',', '.') }}</span>
                                <span class="text-gray-600">/mes</span>
                            @endif
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 mb-6 text-sm">{{ $plan->description }}</p>

                        <!-- Features List -->
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700 text-sm">
                                    @if($plan->devices_limit >= 999)
                                        Dispositivos ilimitados
                                    @else
                                        Hasta {{ $plan->devices_limit }} dispositivo{{ $plan->devices_limit > 1 ? 's' : '' }}
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-start">
                                @if($plan->real_time_protection)
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700 text-sm">Protección en tiempo real</span>
                                @else
                                    <svg class="w-5 h-5 text-gray-300 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-400 text-sm line-through">Protección en tiempo real</span>
                                @endif
                            </li>
                            <li class="flex items-start">
                                @if($plan->cloud_backup)
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700 text-sm">Backup en la nube</span>
                                @else
                                    <svg class="w-5 h-5 text-gray-300 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-400 text-sm line-through">Backup en la nube</span>
                                @endif
                            </li>
                            <li class="flex items-start">
                                @if($plan->vpn_included)
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700 text-sm">VPN incluida</span>
                                @else
                                    <svg class="w-5 h-5 text-gray-300 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-400 text-sm line-through">VPN incluida</span>
                                @endif
                            </li>
                            <li class="flex items-start">
                                @if($plan->priority_support)
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700 text-sm">Soporte prioritario 24/7</span>
                                @else
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700 text-sm">Soporte estándar</span>
                                @endif
                            </li>
                        </ul>

                        <!-- CTA Button -->
                        @auth
                            <a href="#" class="block w-full text-center {{ $plan->name === 'Premium' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-900 hover:bg-gray-800' }} text-white font-bold py-3 rounded-lg transition">
                                Contratar Ahora
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="block w-full text-center {{ $plan->name === 'Premium' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-900 hover:bg-gray-800' }} text-white font-bold py-3 rounded-lg transition">
                                Comenzar Ahora
                            </a>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Preguntas Frecuentes</h2>
            <div class="space-y-6">
                <div class="border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">¿Puedo cambiar de plan en cualquier momento?</h3>
                    <p class="text-gray-700">Sí, puedes cambiar tu plan en cualquier momento desde tu panel de usuario. Los cambios se aplicarán inmediatamente.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">¿Ofrecen garantía de devolución?</h3>
                    <p class="text-gray-700">Sí, ofrecemos una garantía de devolución de 30 días. Si no estás satisfecho, te devolvemos tu dinero.</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">¿Los precios incluyen IVA?</h3>
                    <p class="text-gray-700">Los precios mostrados son finales e incluyen todos los impuestos aplicables.</p>
                </div>
            </div>
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
