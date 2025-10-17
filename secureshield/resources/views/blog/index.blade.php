<x-public-layout>
    <x-slot name="title">Blog - SecureShield</x-slot>

    <!-- Header Section -->
    <section class="pt-32 pb-12 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Blog de Seguridad</h1>
            <p class="text-xl text-blue-100">Consejos, noticias y mejores prácticas en ciberseguridad</p>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
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
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ $post->author->name }}</span>
                                <span class="mx-2">•</span>
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
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
                            <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition group">
                                Leer más
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <div class="text-center py-12 bg-white rounded-2xl shadow-lg">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No hay posts publicados</h3>
                    <p class="text-gray-600 mb-6">Vuelve pronto para leer nuestros artículos sobre seguridad.</p>
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Crear Primer Post
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl font-bold mb-4">¿Listo para proteger tus dispositivos?</h2>
            <p class="text-xl mb-8 text-blue-100">Comienza hoy con SecureShield y mantén tu mundo digital seguro.</p>
            <a href="{{ route('plans.index') }}" class="inline-flex items-center gap-2 bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-xl hover:bg-blue-50 transition transform hover:-translate-y-1 shadow-2xl hover:shadow-blue-500/50">
                Ver Planes
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </section>
</x-public-layout>
