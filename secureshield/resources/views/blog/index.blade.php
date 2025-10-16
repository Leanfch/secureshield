<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - SecureShield</title>
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

    <!-- Header Section -->
    <section class="pt-32 pb-12 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Blog de Seguridad</h1>
            <p class="text-xl text-blue-100">Consejos, noticias y mejores prácticas en ciberseguridad</p>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                        <!-- Image placeholder -->
                        <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            @endif
                        </div>

                        <div class="p-6">
                            <!-- Post meta -->
                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                <span>{{ $post->author->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $post->published_at->format('d M Y') }}</span>
                            </div>

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-gray-700 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>

                            <!-- Read more link -->
                            <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition">
                                Leer más
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No hay posts publicados</h3>
                    <p class="text-gray-600">Vuelve pronto para leer nuestros artículos sobre seguridad.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl font-bold mb-4">¿Listo para proteger tus dispositivos?</h2>
            <p class="text-xl mb-8 text-blue-100">Comienza hoy con SecureShield y mantén tu mundo digital seguro.</p>
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
