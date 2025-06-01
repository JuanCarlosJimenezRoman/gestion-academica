
{{-- resources/views/admin/estudiantes/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Agregar Estudiante</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.estudiantes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label>No. Control</label>
                <input name="num_control" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>Nombre</label>
                <input name="nombre" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>CURP</label>
                <input name="curp" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>Correo</label>
                <input name="correo" type="email" class="w-full border p-2">
            </div>
            <div class="mb-4">
                <label>Retícula</label>
                <select name="id_reticula" class="w-full border p-2">
    @foreach($reticulas as $reticula)
        <option value="{{ $reticula->id_reticula }}">{{ $reticula->carrera }}</option>
    @endforeach
</select>

            </div>
            <div class="mb-4">
                <label>Estatus</label>
                <select name="estatus" class="w-full border p-2">
                    <option value="Regular">Regular</option>
                    <option value="Baja temporal">Baja temporal</option>
                    <option value="Egresado">Egresado</option>
                </select>
            </div>
            <div class="mb-4">
                <label>Fecha Ingreso</label>
                <input type="date" name="fecha_ingreso" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>Fecha Egreso</label>
                <input type="date" name="fecha_egreso" class="w-full border p-2">
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
