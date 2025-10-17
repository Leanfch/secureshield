<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'SecureShield - Protección Antivirus Profesional' }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/secureshield-logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-50">
    <!-- Header with Navigation -->
    @include('layouts.public-header')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('layouts.public-footer')
</body>
</html>
