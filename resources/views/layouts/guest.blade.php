<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MindBox - {{ $title ?? 'Instituto Tecnológico de Pinotepa' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700|poppins:600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .mindbox-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        .mindbox-card {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border-top: 4px solid #3b82f6;
        }
        .mindbox-input {
            border: 1px solid #d1d5db;
            transition: all 0.3s ease;
        }
        .mindbox-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .mindbox-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
        }
        .mindbox-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="mindbox-bg min-h-screen flex flex-col">
    <!-- Header -->
    <header class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <div class="flex items-center">
    <a href="/">
        <div class="text-2xl font-bold text-blue-600">MindBox</div>
    </a>
</div>
            </div>
            <nav>
                @if (Route::has('login'))
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">
                                Dashboard
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
            <div class="mindbox-card bg-white overflow-hidden max-w-md mx-auto">
                <div class="p-8 sm:p-10">
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Instituto Tecnológico de Pinotepa</h1>

                    </div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
        <p>© {{ date('Y') }} MindBox. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
