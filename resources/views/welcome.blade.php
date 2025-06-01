<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MindBox - Instituto Tecnológico de Pinotepa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700|poppins:600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .mindbox-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        .mindbox-card {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
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
        .mindbox-quote {
            position: relative;
            padding-left: 1.5rem;
        }
        .mindbox-quote:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #3b82f6;
            border-radius: 2px;
        }
    </style>
</head>
<body class="mindbox-bg min-h-screen flex flex-col">
    <!-- Header -->
    <header class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <a href="/">
        <div class="text-2xl font-bold text-blue-600">MindBox</div>
    </a>
                <div class="ml-4 text-sm italic text-gray-600 mindbox-quote hidden md:block">

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
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">
                                Iniciar sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="mindbox-card bg-white overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Login Form -->
                    <div class="p-8 sm:p-10">
                        <div class="text-center mb-8">
                            <h1 class="text-2xl font-bold text-gray-900">Instituto Tecnológico de Pinotepa</h1>
                            <div class="flex justify-center space-x-6 mt-4">

                            </div>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Correo electrónico')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input
                                    id="email"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="ejemplo@itp.edu.mx"
                                />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <!-- Password -->
                            <div>
                                <x-input-label for="password" :value="__('Contraseña')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input
                                    id="password"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                />
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input
                                        id="remember_me"
                                        name="remember"
                                        type="checkbox"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    >
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                        {{ __('Recordar sesión') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>

                            <div>
                                <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                    {{ __('Iniciar sesión') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

                    <!-- Right Side - Image/Illustration -->
                    <div class="hidden lg:block bg-gradient-to-br from-blue-50 to-blue-100 relative">
                        <div class="absolute inset-0 flex items-center justify-center p-12">
                            <div class="text-center">
                                <div class="text-blue-600 text-5xl font-bold mb-4">MindBox</div>
                                <p class="text-gray-600 italic">
                                    "La educación es el arma más poderosa que puedes usar para cambiar el mundo"
                                </p>
                                <p class="text-xs text-gray-500 mt-8">MindBox®. Todos los derechos reservados 2025©</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
        <p>© 2025 MindBox. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
