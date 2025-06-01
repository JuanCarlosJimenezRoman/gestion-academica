<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-black ">Detalle del Estudiante</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.estudiantes.edit', $estudiante) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Editar
                </a>
                <a href="{{ route('admin.estudiantes.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Información Personal</h3>
            </div>
            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">No. Control</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->num_control }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Nombre Completo</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">CURP</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->curp }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Correo Electrónico</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->correo }}</p>
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Información Académica</h3>
            </div>
            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Retícula</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->reticula->nombre ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Estatus</p>
                    <span class="mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        {{ $estudiante->estatus == 'Regular' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                           ($estudiante->estatus == 'Baja temporal' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' :
                           'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200') }}">
                        {{ $estudiante->estatus }}
                    </span>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Fecha Ingreso</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->fecha_ingreso }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Fecha Egreso</p>
                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $estudiante->fecha_egreso ?? '---' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
