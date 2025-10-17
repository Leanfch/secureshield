<x-public-layout>
    <x-slot name="title">{{ $post->title }} - SecureShield Blog</x-slot>

    <!-- Article Header -->
    <article class="pt-24 pb-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Back button -->
            <div class="mb-8">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Volver al blog
                </a>
            </div>

            <!-- Article meta -->
            <div class="flex items-center text-sm text-gray-600 mb-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        {{ strtoupper(substr($post->author->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">{{ $post->author->name }}</p>
                        <div class="flex items-center text-xs">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $post->published_at->format('d \d\e F \d\e Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                {{ $post->title }}
            </h1>

            <!-- Featured Image -->
            @if($post->image)
            <div class="mb-8 rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto">
            </div>
            @else
            <div class="mb-8 h-96 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center shadow-2xl">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            @endif

            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                    <div class="text-gray-800 text-lg leading-relaxed whitespace-pre-line">
                        {{ $post->content }}
                    </div>
                </div>
            </div>

            <!-- Tags Section (if you add tags later) -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Seguridad</span>
                    <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Ciberseguridad</span>
                </div>
            </div>

            <!-- Share section -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Comparte este artículo</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post->slug)) }}&title={{ urlencode($post->title) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        LinkedIn
                    </a>
                </div>
            </div>

            <!-- Author card -->
            <div class="mt-12 p-6 bg-gradient-to-br from-blue-50 to-white rounded-2xl border-2 border-blue-100">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                        {{ strtoupper(substr($post->author->name, 0, 1)) }}
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-1">{{ $post->author->name }}</h4>
                        <p class="text-gray-600">Experto en seguridad informática en SecureShield</p>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Related CTA -->
    <section class="py-16 px-4 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Te gustó este artículo?</h2>
            <p class="text-xl mb-8 text-blue-100">Mantente protegido con SecureShield y disfruta de la mejor seguridad para tus dispositivos</p>
            <a href="{{ route('plans.index') }}" class="inline-flex items-center gap-2 bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-xl hover:bg-blue-50 transition transform hover:-translate-y-1 shadow-2xl hover:shadow-blue-500/50">
                Ver Planes
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </section>
</x-public-layout>
