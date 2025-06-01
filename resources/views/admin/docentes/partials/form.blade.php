<div>
    <label for="rfc" class="block font-medium text-sm text-gray-700 dark:text-gray-300">RFC</label>
    <input type="text" name="rfc" id="rfc" value="{{ old('rfc', $docente->rfc ?? '') }}" class="input input-bordered w-full" {{ isset($docente) ? 'readonly' : '' }} required>
    @error('rfc')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <label for="nombre" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $docente->nombre ?? '') }}" class="input input-bordered w-full" required>
    @error('nombre')
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mt-4">
    <label for="especialidad" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Especialidad</label>
    <input type="text" name="especialidad" id="especialidad" value="{{ old('especialidad', $docente->especialidad ?? '') }}" class="input input-bordered w-full">
</div>

<div class="mt-4">
    <label for="telefono" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $docente->telefono ?? '') }}" class="input input-bordered w-full">
</div>

<div class="mt-4">
    <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Correo Electrónico</label>
    <input type="email" name="email" id="email" value="{{ old('email', $docente->email ?? '') }}" class="input input-bordered w-full">
</div>
