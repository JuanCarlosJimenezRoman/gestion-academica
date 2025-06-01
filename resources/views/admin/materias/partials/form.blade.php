<div>
    <label for="clave_materia" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Clave Materia</label>
    <input type="text" name="clave_materia" id="clave_materia" value="{{ old('clave_materia', $materia->clave_materia ?? '') }}" class="input input-bordered w-full" {{ isset($materia) ? 'readonly' : '' }} required>
    @error('clave_materia')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <label for="nombre" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $materia->nombre ?? '') }}" class="input input-bordered w-full" required>
    @error('nombre')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <label for="nombre_abreviado" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre Abreviado</label>
    <input type="text" name="nombre_abreviado" id="nombre_abreviado" value="{{ old('nombre_abreviado', $materia->nombre_abreviado ?? '') }}" class="input input-bordered w-full">
</div>

<div class="mt-4">
    <label for="nivel" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nivel</label>
    <input type="number" name="nivel" id="nivel" value="{{ old('nivel', $materia->nivel ?? '') }}" class="input input-bordered w-full" min="1" max="10">
</div>

<div class="mt-4">
    <label for="tipo" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tipo</label>
    <select name="tipo" id="tipo" class="input input-bordered w-full">
        @foreach(['Base', 'Optativa', 'Especialidad', 'Extra'] as $tipo)
            <option value="{{ $tipo }}" @selected(old('tipo', $materia->tipo ?? '') == $tipo)>{{ $tipo }}</option>
        @endforeach
    </select>
</div>

<div class="mt-4">
    <label for="area_academica" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Área Académica</label>
    <input type="text" name="area_academica" id="area_academica" value="{{ old('area_academica', $materia->area_academica ?? '') }}" class="input input-bordered w-full">
</div>
