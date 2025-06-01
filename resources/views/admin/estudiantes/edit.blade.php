{{-- resources/views/admin/estudiantes/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Editar Estudiante</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.estudiantes.update', $estudiante) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Nombre</label>
                <input name="nombre" value="{{ $estudiante->nombre }}" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>CURP</label>
                <input name="curp" value="{{ $estudiante->curp }}" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>Correo</label>
                <input name="correo" type="email" value="{{ $estudiante->correo }}" class="w-full border p-2">
            </div>
            <div class="mb-4">
                <label>Retícula</label>
                <select name="id_reticula" class="w-full border p-2">
                    @foreach($reticulas as $reticula)
                        <option value="{{ $reticula->id }}" {{ $reticula->id == $estudiante->id_reticula ? 'selected' : '' }}>{{ $reticula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Estatus</label>
                <select name="estatus" class="w-full border p-2">
                    <option value="Regular" {{ $estudiante->estatus == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option value="Baja temporal" {{ $estudiante->estatus == 'Baja temporal' ? 'selected' : '' }}>Baja temporal</option>
                    <option value="Egresado" {{ $estudiante->estatus == 'Egresado' ? 'selected' : '' }}>Egresado</option>
                </select>
            </div>
            <div class="mb-4">
                <label>Fecha Ingreso</label>
                <input type="date" name="fecha_ingreso" value="{{ $estudiante->fecha_ingreso }}" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label>Fecha Egreso</label>
                <input type="date" name="fecha_egreso" value="{{ $estudiante->fecha_egreso }}" class="w-full border p-2">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>
