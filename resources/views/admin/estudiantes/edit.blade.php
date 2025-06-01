<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-black">Editar Estudiante: {{ $estudiante->nombre }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
            <form action="{{ route('admin.estudiantes.update', $estudiante) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">No. Control</label>
                        <input value="{{ $estudiante->num_control }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-300" readonly>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nombre Completo</label>
                        <input name="nombre" value="{{ $estudiante->nombre }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">CURP</label>
                        <input name="curp" value="{{ $estudiante->curp }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Correo Electrónico</label>
                        <input name="correo" type="email" value="{{ $estudiante->correo }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Retícula</label>
                        <select name="id_reticula" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                            @foreach($reticulas as $reticula)
                                <option value="{{ $reticula->id }}" {{ $reticula->id == $estudiante->id_reticula ? 'selected' : '' }}>{{ $reticula->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Estatus</label>
                        <select name="estatus" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                            <option value="Regular" {{ $estudiante->estatus == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="Baja temporal" {{ $estudiante->estatus == 'Baja temporal' ? 'selected' : '' }}>Baja temporal</option>
                            <option value="Egresado" {{ $estudiante->estatus == 'Egresado' ? 'selected' : '' }}>Egresado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Fecha Ingreso</label>
                        <input type="date" name="fecha_ingreso" value="{{ $estudiante->fecha_ingreso }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Fecha Egreso</label>
                        <input type="date" name="fecha_egreso" value="{{ $estudiante->fecha_egreso }}" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('admin.estudiantes.show', $estudiante) }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Actualizar Estudiante
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
