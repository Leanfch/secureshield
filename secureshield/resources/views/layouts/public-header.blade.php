<header class="bg-blue-950 backdrop-blur-md shadow-lg fixed w-full z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center group" aria-label="SecureShield Home">
                    <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield Logo" class="h-12 transition-transform">
                </a>
            </div>
            <ul class="hidden md:flex items-center space-x-8">
                <li><a href="{{ route('home') }}" class="text-slate-200 hover:text-blue-400 font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-blue-100 font-semibold border-b-2 border-blue-600 pb-1' : '' }}">Inicio</a></li>
                <li><a href="{{ route('plans.index') }}" class="text-slate-200 hover:text-blue-400 font-medium transition-colors duration-200 {{ request()->routeIs('plans.*') ? 'text-blue-100 font-semibold border-b-2 border-blue-600 pb-1' : '' }}">Planes</a></li>
                <li><a href="{{ route('blog.index') }}" class="text-slate-200 hover:text-blue-400 font-medium transition-colors duration-200 {{ request()->routeIs('blog.*') ? 'text-blue-100 font-semibold border-b-2 border-blue-600 pb-1' : '' }}">Blog</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}" class="text-slate-200 hover:text-blue-400 font-medium transition-colors duration-200">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-slate-200 hover:text-blue-400 font-medium transition-colors duration-200">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 font-semibold">Registrarse</a></li>
                @endauth
            </ul>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button x-data @click="$dispatch('toggle-mobile-menu')" class="text-white hover:text-blue-400 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-data="{ open: false }" @toggle-mobile-menu.window="open = !open" x-show="open" x-transition class="md:hidden pb-4">
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="block text-slate-200 hover:text-blue-400 py-2">Inicio</a></li>
                <li><a href="{{ route('plans.index') }}" class="block text-slate-200 hover:text-blue-400 py-2">Planes</a></li>
                <li><a href="{{ route('blog.index') }}" class="block text-slate-200 hover:text-blue-400 py-2">Blog</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}" class="block text-slate-200 hover:text-blue-400 py-2">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="block text-slate-200 hover:text-blue-400 py-2">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register') }}" class="block bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-xl text-center">Registrarse</a></li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
