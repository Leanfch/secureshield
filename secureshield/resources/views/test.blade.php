<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test - SecureShield Database</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">SecureShield - Database Test</h1>

        <!-- Plans Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Planes de Antivirus ({{ $plans->count() }})</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($plans as $plan)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                    <h3 class="text-xl font-bold mb-2 text-blue-600">{{ $plan->name }}</h3>
                    <p class="text-3xl font-bold mb-4 text-gray-800">${{ number_format($plan->price, 2) }}</p>
                    <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <span class="mr-2">{{ $plan->devices_limit }} dispositivos</span>
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">{{ $plan->real_time_protection ? '✓' : '✗' }} Protección en tiempo real</span>
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">{{ $plan->cloud_backup ? '✓' : '✗' }} Backup en la nube</span>
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">{{ $plan->vpn_included ? '✓' : '✗' }} VPN incluida</span>
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">{{ $plan->priority_support ? '✓' : '✗' }} Soporte prioritario</span>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Users Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Usuarios ({{ $users->count() }})</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plan Activo</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $user->role->name === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($user->role->name) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($user->activeSubscription)
                                    <span class="text-blue-600 font-medium">{{ $user->activeSubscription->plan->name }}</span>
                                @else
                                    <span class="text-gray-400">Sin plan</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Subscriptions Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Suscripciones Activas ({{ $subscriptions->count() }})</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Inicio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($subscriptions as $subscription)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $subscription->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-blue-600">{{ $subscription->plan->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $subscription->start_date->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $subscription->end_date ? $subscription->end_date->format('d/m/Y') : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Posts del Blog ({{ $posts->count() }} publicados)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-500 mb-3">
                        Por: {{ $post->author->name }} | {{ $post->published_at->format('d/m/Y') }}
                    </p>
                    <p class="text-gray-600">{{ Str::limit($post->content, 150) }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="/" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                Volver al inicio
            </a>
        </div>
    </div>
</body>
</html>
