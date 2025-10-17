<footer class="bg-slate-950 text-white py-16 px-4 border-t border-blue-900/20">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-4 gap-10 mb-12">
            <div>
                <img src="{{ asset('assets/secureshield-logo-text.svg') }}" alt="SecureShield" class="h-12 mb-6">
                <p class="text-slate-400 leading-relaxed mb-4">Protección antivirus profesional para todos tus dispositivos.</p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-blue-600/20 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-600/20 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors" aria-label="Twitter">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-600/20 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors" aria-label="YouTube">
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
