<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:from-blue-700 hover:to-blue-800 focus:from-blue-700 focus:to-blue-800 active:from-blue-800 active:to-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg hover:shadow-xl transition-all ease-in-out duration-150 transform hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
