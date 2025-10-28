<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Recuperar Contraseña</h2>
        <p class="text-sm text-gray-600 mt-2">Te enviaremos un enlace para restablecer tu contraseña</p>
    </div>

    <div class="mb-6 text-sm text-gray-600 bg-blue-50 border border-blue-200 rounded-lg p-4">
        ¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo electrónico y te enviaremos un enlace para que puedas crear una nueva.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Correo Electrónico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="tu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 mt-6">
            <x-primary-button class="w-full justify-center">
                Enviar Enlace de Recuperación
            </x-primary-button>

            <div class="text-center text-sm text-gray-600">
                <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-800">Volver al inicio de sesión</a>
            </div>
        </div>
    </form>
</x-guest-layout>
