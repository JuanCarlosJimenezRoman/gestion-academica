<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo con efecto hover -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 group">
                        <x-application-logo class="block h-9 w-auto fill-current text-white group-hover:text-blue-200 transition duration-300" />
                        <span class="text-white font-bold text-xl hidden md:inline-block group-hover:text-blue-200 transition duration-300">MindBox</span>
                    </a>
                </div>

                <!-- Navigation Links con efecto hover -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition duration-300">
                        {{ __('Admin Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.estudiantes.index')" :active="request()->routeIs('admin.estudiantes.*')" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition duration-300">
                        {{ __('Estudiantes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.docentes.index')" :active="request()->routeIs('admin.docentes.*')" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition duration-300">
                        {{ __('Docentes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.materias.index')" :active="request()->routeIs('admin.materias.*')" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition duration-300">
                        {{ __('Materias') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.logs.index')" :active="request()->routeIs('admin.logs.*')" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition duration-300">
                        {{ __('Logs') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- User Dropdown con mejor estilo -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 text-sm font-medium text-white hover:text-blue-200 focus:outline-none transition duration-300">
                            <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="py-1 bg-white rounded-md shadow-xl">
                        <x-dropdown-link :href="route('profile.edit')" class="px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 hover:text-blue-800 transition duration-300">
                            <i class="fas fa-user-circle mr-2"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 hover:text-blue-800 transition duration-300"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu con mejor estilo -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-blue-200 hover:bg-blue-700 focus:outline-none transition duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu con mejor estilo -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md">
                {{ __('Admin Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.estudiantes.index')" :active="request()->routeIs('admin.estudiantes.*')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md">
                {{ __('Estudiantes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.docentes.index')" :active="request()->routeIs('admin.docentes.*')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md">
                {{ __('Docentes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.materias.index')" :active="request()->routeIs('admin.materias.*')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md">
                {{ __('Materias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.logs.index')" :active="request()->routeIs('admin.logs.*')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md">
                {{ __('Logs') }}
            </x-responsive-nav-link>
        </div>

        <!-- User Info Mobile -->
        <div class="pt-4 pb-1 border-t border-blue-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
