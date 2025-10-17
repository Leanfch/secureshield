<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes - SecureShield</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/secureshield-logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield" class="h-12 transition-transform group-hover:scale-105">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Inicio</a>
                    <a href="{{ route('plans.index') }}" class="text-blue-900 font-semibold border-b-2 border-blue-600 pb-1 transition">Planes</a>
                    <a href="{{ route('blog.index') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Blog</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-700 hover:text-blue-600 font-medium transition-colors duration-200">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 font-semibold">Registrarse</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="relative pt-32 pb-16 px-4 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-950 -z-10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMyNTYzZWIiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAtMjBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-10 -z-10"></div>

        <div class="max-w-7xl mx-auto text-center text-white">
            <div class="inline-block mb-6">
                <span class="bg-blue-500/20 text-blue-200 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm border border-blue-400/30">
                    💎 Planes Flexibles
                </span>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6">Elige el Plan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200">Perfecto</span> para Ti</h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">Protección profesional adaptada a tus necesidades. Todos los planes incluyen actualizaciones automáticas y soporte técnico.</p>
        </div>
    </section>

    <!-- Plans Section -->
    <section class="py-20 px-4 -mt-8">
        <div class="max-w-7xl mx-auto">
            <!-- Success/Error Messages -->
            @if(session('success'))
            <div class="mb-8 bg-green-50 border-2 border-green-500 text-green-900 px-6 py-4 rounded-xl shadow-lg">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-8 bg-red-50 border-2 border-red-500 text-red-900 px-6 py-4 rounded-xl shadow-lg">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="font-semibold">{{ session('error') }}</p>
                </div>
            </div>
            @endif

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($plans as $plan)
                <div class="group relative bg-white rounded-3xl shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-300 {{ $plan->name === 'Premium' ? 'ring-4 ring-blue-500 shadow-2xl shadow-blue-500/50' : 'border-2 border-blue-100' }}">
                    @if($plan->name === 'Premium')
                    <div class="absolute top-0 right-0 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-6 py-2 rounded-bl-2xl font-bold text-sm shadow-lg">
                        ⭐ MÁS POPULAR
                    </div>
                    @endif

                    <div class="p-8 {{ $plan->name === 'Premium' ? 'bg-gradient-to-br from-blue-50 to-white' : '' }}">
                        <!-- Plan Name -->
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">{{ $plan->name }}</h3>

                        <!-- Price -->
                        <div class="mb-6">
                            @if($plan->price == 0)
                                <span class="text-5xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Gratis</span>
                            @else
                                <span class="text-5xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">${{ number_format($plan->price, 0, ',', '.') }}</span>
                                <span class="text-slate-600 font-medium">/mes</span>
                            @endif
                        </div>

                        <!-- Description -->
                        <p class="text-slate-600 mb-8 text-sm leading-relaxed">{{ $plan->description }}</p>

                        <!-- Features List -->
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="ml-3 text-slate-700 font-medium">
                                    @if($plan->devices_limit >= 999)
                                        <span class="text-blue-600 font-bold">Dispositivos ilimitados</span>
                                    @else
                                        Hasta <span class="text-blue-600 font-bold">{{ $plan->devices_limit }}</span> dispositivo{{ $plan->devices_limit > 1 ? 's' : '' }}
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-start">
                                @if($plan->real_time_protection)
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-slate-700 font-medium">Protección en tiempo real</span>
                                @else
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-slate-400 line-through">Protección en tiempo real</span>
                                @endif
                            </li>
                            <li class="flex items-start">
                                @if($plan->cloud_backup)
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-slate-700 font-medium">Backup en la nube</span>
                                @else
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-slate-400 line-through">Backup en la nube</span>
                                @endif
                            </li>
                            <li class="flex items-start">
                                @if($plan->vpn_included)
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-slate-700 font-medium">VPN incluida</span>
                                @else
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-slate-400 line-through">VPN incluida</span>
                                @endif
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="ml-3 text-slate-700 font-medium">
                                    @if($plan->priority_support)
                                        <span class="text-blue-600 font-bold">Soporte prioritario 24/7</span>
                                    @else
                                        Soporte estándar
                                    @endif
                                </span>
                            </li>
                        </ul>

                        <!-- CTA Button -->
                        @auth
                            @php
                                $userActiveSubscription = Auth::user()->activeSubscription;
                                $isCurrentPlan = $userActiveSubscription && $userActiveSubscription->plan_id === $plan->id;
                            @endphp

                            @if($isCurrentPlan)
                                <button disabled class="block w-full text-center bg-gray-400 text-white font-bold py-4 rounded-xl cursor-not-allowed">
                                    Plan Actual
                                </button>
                            @else
                                <form action="{{ route('payment.create') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <button type="submit" class="block w-full text-center {{ $plan->name === 'Premium' ? 'bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 shadow-xl shadow-blue-500/30' : 'bg-slate-900 hover:bg-slate-800' }} text-white font-bold py-4 rounded-xl transition-all duration-200 transform hover:-translate-y-1 hover:shadow-2xl">
                                        @if($plan->price == 0)
                                            Activar Plan Gratis
                                        @else
                                            Contratar Ahora
                                        @endif
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('register') }}" class="block w-full text-center {{ $plan->name === 'Premium' ? 'bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 shadow-xl shadow-blue-500/30' : 'bg-slate-900 hover:bg-slate-800' }} text-white font-bold py-4 rounded-xl transition-all duration-200 transform hover:-translate-y-1 hover:shadow-2xl">
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
    <section class="py-20 px-4 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider mb-4 block">FAQ</span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Preguntas Frecuentes</h2>
                <p class="text-xl text-slate-600">Todo lo que necesitas saber sobre nuestros planes</p>
            </div>

            <div class="space-y-6">
                <div class="group border-2 border-blue-100 hover:border-blue-300 rounded-2xl p-8 transition-all duration-200 hover:shadow-lg">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                                <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-3">¿Puedo cambiar de plan en cualquier momento?</h3>
                            <p class="text-slate-600 leading-relaxed">Sí, puedes cambiar tu plan en cualquier momento desde tu panel de usuario. Los cambios se aplicarán inmediatamente y ajustaremos la facturación de forma proporcional.</p>
                        </div>
                    </div>
                </div>

                <div class="group border-2 border-blue-100 hover:border-blue-300 rounded-2xl p-8 transition-all duration-200 hover:shadow-lg">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                                <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-3">¿Ofrecen garantía de devolución?</h3>
                            <p class="text-slate-600 leading-relaxed">Sí, ofrecemos una garantía de devolución de 30 días sin preguntas. Si no estás satisfecho con nuestro servicio, te devolvemos el 100% de tu dinero.</p>
                        </div>
                    </div>
                </div>

                <div class="group border-2 border-blue-100 hover:border-blue-300 rounded-2xl p-8 transition-all duration-200 hover:shadow-lg">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                                <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-3">¿Los precios incluyen IVA?</h3>
                            <p class="text-slate-600 leading-relaxed">Los precios mostrados son finales e incluyen todos los impuestos aplicables según tu región. No hay costos ocultos ni cargos adicionales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24 px-4 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-950 -z-10"></div>
        <div class="absolute inset-0 opacity-10 -z-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMyNTYzZWIiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAtMjBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')]"></div>

        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-6">¿Necesitas ayuda para elegir?</h2>
            <p class="text-xl mb-10 text-blue-100">Nuestro equipo de expertos está disponible para ayudarte a encontrar el plan perfecto para tus necesidades</p>

            <div class="flex flex-col sm:flex-row gap-5 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 bg-white text-blue-900 px-10 py-5 rounded-xl font-bold text-lg hover:bg-blue-50 transition-all duration-200 shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Contactar Soporte
                </a>
                <a href="{{ route('blog.index') }}" class="inline-flex items-center justify-center gap-2 border-2 border-white/50 text-white px-10 py-5 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-900 transition-all duration-200 backdrop-blur-sm transform hover:-translate-y-1">
                    Ver Comparativa Completa
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
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
