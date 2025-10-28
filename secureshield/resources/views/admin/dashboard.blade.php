<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Users -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 overflow-hidden shadow-2xl rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium mb-1">Total Usuarios</p>
                                <p class="text-4xl font-extrabold text-white">{{ $totalUsers }}</p>
                            </div>
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Subscriptions -->
                <div class="bg-gradient-to-br from-green-500 to-green-700 overflow-hidden shadow-2xl rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium mb-1">Suscripciones Activas</p>
                                <p class="text-4xl font-extrabold text-white">{{ $totalSubscriptions }}</p>
                            </div>
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Posts -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 overflow-hidden shadow-2xl rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium mb-1">Posts del Blog</p>
                                <p class="text-4xl font-extrabold text-white">{{ $totalPosts }}</p>
                            </div>
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Published Posts -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-700 overflow-hidden shadow-2xl rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100 text-sm font-medium mb-1">Posts Publicados</p>
                                <p class="text-4xl font-extrabold text-white">{{ $publishedPosts }}</p>
                            </div>
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Most Popular Plan -->
            @if($mostPopularPlan)
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl border-2 border-blue-100">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Plan Más Popular</h3>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 border-2 border-blue-300 rounded-2xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="inline-block px-4 py-1 bg-blue-600 text-white text-sm font-bold rounded-full mb-2">
                                    ⭐ Más Vendido
                                </div>
                                <p class="text-3xl font-bold text-blue-900">{{ $mostPopularPlan->name }}</p>
                                <p class="text-blue-700 font-medium">{{ $mostPopularPlan->subscriptions_count }} suscripciones activas</p>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">${{ number_format($mostPopularPlan->price, 0, ',', '.') }}</p>
                                <p class="text-sm text-blue-700 font-medium">por mes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Plan Distribution -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl border-2 border-blue-100">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Distribución de Planes</h3>
                    </div>
                    <div class="space-y-4">
                        @foreach($planDistribution as $plan)
                        <div class="p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-gray-900 font-bold text-lg">{{ $plan->name }}</span>
                                <span class="text-blue-600 font-extrabold text-xl">{{ $plan->count }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                @php
                                    $percentage = $totalSubscriptions > 0 ? ($plan->count / $totalSubscriptions) * 100 : 0;
                                @endphp
                                <div class="bg-gradient-to-r from-blue-600 to-blue-700 h-3 rounded-full transition-all duration-500 shadow-lg" style="width: {{ $percentage }}%"></div>
                            </div>
                            <p class="text-sm text-gray-600 mt-2">{{ number_format($percentage, 1) }}% del total</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Subscriptions -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl border-2 border-blue-100">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-700 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Suscripciones Recientes</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-blue-600 to-blue-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Plan</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Fecha Inicio</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentSubscriptions as $subscription)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold mr-3">
                                                {{ strtoupper(substr($subscription->user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900">{{ $subscription->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $subscription->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-bold rounded-lg">{{ $subscription->plan->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-medium">
                                        {{ $subscription->start_date->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full
                                            {{ $subscription->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $subscription->status === 'active' ? '✓ Activa' : ucfirst($subscription->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.posts.index') }}" class="group block p-8 bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-2xl shadow-2xl transition transform hover:-translate-y-1 hover:shadow-blue-500/50">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-xl mb-1">Gestionar Posts</h4>
                            <p class="text-blue-100 text-sm">Crear, editar y eliminar posts del blog</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.users.index') }}" class="group block p-8 bg-gradient-to-br from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 rounded-2xl shadow-2xl transition transform hover:-translate-y-1 hover:shadow-green-500/50">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-xl mb-1">Ver Usuarios</h4>
                            <p class="text-green-100 text-sm">Listado de usuarios y sus suscripciones</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('blog.index') }}" class="group block p-8 bg-gradient-to-br from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 rounded-2xl shadow-2xl transition transform hover:-translate-y-1 hover:shadow-purple-500/50">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-xl mb-1">Ver Sitio Público</h4>
                            <p class="text-purple-100 text-sm">Visitar el blog y páginas públicas</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
