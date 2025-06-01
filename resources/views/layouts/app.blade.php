<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MindBox - {{ $title ?? 'Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700|poppins:600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .mindbox-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        .mindbox-nav {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .mindbox-card {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body class="mindbox-bg min-h-screen">
                @include('layouts.navigation')


    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mindbox-card bg-white p-6">
                {{ $slot }}
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
        <p>© {{ date('Y') }} MindBox. Todos los derechos .</p>
        <p class="mt-1 text-xs italic">"La educación es el arma más poderosa que puedes usar para cambiar el mundo" - Nelson Mandela</p>
    </footer>
</body>
</html>
