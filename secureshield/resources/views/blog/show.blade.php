<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - SecureShield Blog</title>
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
                    <a href="{{ route('blog.index') }}" class="text-blue-600 font-bold">Blog</a>
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

    <!-- Article Header -->
    <article class="pt-24 pb-12">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Back button -->
            <div class="mb-8">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Volver al blog
                </a>
            </div>

            <!-- Article meta -->
            <div class="flex items-center text-sm text-gray-600 mb-4">
                <span class="font-semibold text-gray-900">{{ $post->author->name }}</span>
                <span class="mx-2">•</span>
                <span>{{ $post->published_at->format('d \d\e F \d\e Y') }}</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                {{ $post->title }}
            </h1>

            <!-- Featured Image -->
            @if($post->image)
            <div class="mb-8 rounded-xl overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto">
            </div>
            @else
            <div class="mb-8 h-96 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            @endif

            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                    <div class="text-gray-800 text-lg leading-relaxed whitespace-pre-line">
                        {{ $post->content }}
                    </div>
                </div>
            </div>

            <!-- Share section -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Comparte este artículo</h3>
                <div class="flex gap-4">
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </a>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </a>
                </div>
            </div>
        </div>
    </article>

    <!-- Related CTA -->
    <section class="py-16 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-3xl font-bold mb-4">¿Te gustó este artículo?</h2>
            <p class="text-xl mb-8 text-blue-100">Mantente protegido con SecureShield</p>
            <a href="{{ route('plans.index') }}" class="inline-block bg-white text-blue-600 px-10 py-4 rounded-lg font-bold text-xl hover:bg-blue-50 transition">
                Ver Planes
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
