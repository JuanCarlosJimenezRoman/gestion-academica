<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($materia) ? __('Editar Materia') : __('Crear Materia') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
            <form action="{{ isset($materia) ? route('admin.materias.update', $materia->clave_materia) : route('admin.materias.store') }}" method="POST">
                @csrf
                @if(isset($materia))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="clave_materia" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Clave Materia</label>
                        <input type="text" name="clave_materia" id="clave_materia"
                               value="{{ old('clave_materia', $materia->clave_materia ?? '') }}"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300"
                               {{ isset($materia) ? 'readonly' : '' }} required>
                        @error('clave_materia')
                            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nombre" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                               value="{{ old('nombre', $materia->nombre ?? '') }}"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300"
                               required>
                        @error('nombre')
                            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nombre_abreviado" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nombre Abreviado</label>
                        <input type="text" name="nombre_abreviado" id="nombre_abreviado"
                               value="{{ old('nombre_abreviado', $materia->nombre_abreviado ?? '') }}"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                    </div>

                    <div>
                        <label for="nivel" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nivel</label>
                        <input type="number" name="nivel" id="nivel"
                               value="{{ old('nivel', $materia->nivel ?? '') }}"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300"
                               min="1" max="10">
                    </div>

                    <div>
                        <label for="tipo" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Tipo</label>
                        <select name="tipo" id="tipo"
                                class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                            @foreach(['Base', 'Optativa', 'Especialidad', 'Extra'] as $tipo)
                                <option value="{{ $tipo }}" @selected(old('tipo', $materia->tipo ?? '') == $tipo)>{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="area_academica" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Área Académica</label>
                        <input type="text" name="area_academica" id="area_academica"
                               value="{{ old('area_academica', $materia->area_academica ?? '') }}"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition duration-300">
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('admin.materias.index') }}"
                       class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        {{ isset($materia) ? 'Actualizar' : 'Guardar' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
