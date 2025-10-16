<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Usuarios</dt>
                                    <dd class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Subscriptions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Suscripciones Activas</dt>
                                    <dd class="text-3xl font-bold text-gray-900">{{ $totalSubscriptions }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Posts -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Posts del Blog</dt>
                                    <dd class="text-3xl font-bold text-gray-900">{{ $totalPosts }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Published Posts -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Posts Publicados</dt>
                                    <dd class="text-3xl font-bold text-gray-900">{{ $publishedPosts }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Most Popular Plan -->
            @if($mostPopularPlan)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Plan Más Popular</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-2xl font-bold text-blue-600">{{ $mostPopularPlan->name }}</p>
                            <p class="text-gray-600">{{ $mostPopularPlan->subscriptions_count }} suscripciones activas</p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-gray-900">${{ number_format($mostPopularPlan->price, 0, ',', '.') }}</p>
                            <p class="text-sm text-gray-500">por mes</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Plan Distribution -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Distribución de Planes</h3>
                    <div class="space-y-3">
                        @foreach($planDistribution as $plan)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 font-medium">{{ $plan->name }}</span>
                            <div class="flex items-center">
                                <div class="w-64 bg-gray-200 rounded-full h-4 mr-3">
                                    @php
                                        $percentage = $totalSubscriptions > 0 ? ($plan->count / $totalSubscriptions) * 100 : 0;
                                    @endphp
                                    <div class="bg-blue-600 h-4 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                                <span class="text-gray-900 font-bold w-12 text-right">{{ $plan->count }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Subscriptions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Suscripciones Recientes</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Inicio</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentSubscriptions as $subscription)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $subscription->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $subscription->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-blue-600">{{ $subscription->plan->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $subscription->start_date->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $subscription->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($subscription->status) }}
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
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.posts.index') }}" class="block p-6 bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg transition">
                    <h4 class="text-white font-bold text-lg mb-2">Gestionar Posts</h4>
                    <p class="text-blue-100 text-sm">Crear, editar y eliminar posts del blog</p>
                </a>
                <a href="{{ route('admin.users.index') }}" class="block p-6 bg-green-600 hover:bg-green-700 rounded-lg shadow-lg transition">
                    <h4 class="text-white font-bold text-lg mb-2">Ver Usuarios</h4>
                    <p class="text-green-100 text-sm">Listado de usuarios y sus suscripciones</p>
                </a>
                <a href="{{ route('blog.index') }}" class="block p-6 bg-purple-600 hover:bg-purple-700 rounded-lg shadow-lg transition">
                    <h4 class="text-white font-bold text-lg mb-2">Ver Sitio Público</h4>
                    <p class="text-purple-100 text-sm">Visitar el blog y páginas públicas</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
