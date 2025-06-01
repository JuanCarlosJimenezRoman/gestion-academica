{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensaje de bienvenida -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Bienvenido, {{ Auth::user()->name }}</h1>
                <p class="text-blue-100">Desde aquí puedes gestionar todos los aspectos del sistema.</p>
            </div>

            <!-- Estadísticas rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Tarjeta Estudiantes -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow sm:rounded-lg transition transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-800 dark:text-blue-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Estudiantes</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">1,248</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Docentes -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow sm:rounded-lg transition transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600 dark:bg-green-800 dark:text-green-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Docentes</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">84</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Materias -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow sm:rounded-lg transition transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-800 dark:text-purple-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Materias</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">36</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Actividad -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow sm:rounded-lg transition transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 dark:bg-yellow-800 dark:text-yellow-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-300">Actividad Hoy</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">127</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Acciones Rápidas -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Acciones Rápidas</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('admin.estudiantes.create') }}" class="bg-blue-50 dark:bg-blue-900 hover:bg-blue-100 dark:hover:bg-blue-800 p-4 rounded-lg transition duration-300 flex items-center">
                        <div class="bg-blue-100 dark:bg-blue-700 p-3 rounded-full mr-4">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <span class="text-blue-800 dark:text-blue-200 font-medium">Nuevo Estudiante</span>
                    </a>

                    <a href="{{ route('admin.docentes.create') }}" class="bg-green-50 dark:bg-green-900 hover:bg-green-100 dark:hover:bg-green-800 p-4 rounded-lg transition duration-300 flex items-center">
                        <div class="bg-green-100 dark:bg-green-700 p-3 rounded-full mr-4">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <span class="text-green-800 dark:text-green-200 font-medium">Nuevo Docente</span>
                    </a>

                    <a href="{{ route('admin.materias.create') }}" class="bg-purple-50 dark:bg-purple-900 hover:bg-purple-100 dark:hover:bg-purple-800 p-4 rounded-lg transition duration-300 flex items-center">
                        <div class="bg-purple-100 dark:bg-purple-700 p-3 rounded-full mr-4">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="text-purple-800 dark:text-purple-200 font-medium">Nueva Materia</span>
                    </a>
                </div>
            </div>

            <!-- Última actividad -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Última Actividad</h3>
                <div class="space-y-4">
                    <div class="flex items-start border-b border-gray-200 dark:border-gray-700 pb-4">
                        <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-full mr-4">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">Nuevo estudiante registrado</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Juan Pérez se registró hace 15 minutos</p>
                        </div>
                        <span class="ml-auto text-sm text-gray-500 dark:text-gray-400">10:45 AM</span>
                    </div>

                    <div class="flex items-start border-b border-gray-200 dark:border-gray-700 pb-4">
                        <div class="bg-green-100 dark:bg-green-900 p-2 rounded-full mr-4">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">Sistema actualizado</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Versión 2.3.1 instalada correctamente</p>
                        </div>
                        <span class="ml-auto text-sm text-gray-500 dark:text-gray-400">Ayer, 3:30 PM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
