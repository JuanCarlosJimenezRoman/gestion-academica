{{-- resources/views/admin/estudiantes/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detalle del Estudiante</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <p><strong>No. Control:</strong> {{ $estudiante->num_control }}</p>
        <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
        <p><strong>CURP:</strong> {{ $estudiante->curp }}</p>
        <p><strong>Correo:</strong> {{ $estudiante->correo }}</p>
        <p><strong>Retícula:</strong> {{ $estudiante->reticula->nombre ?? 'N/A' }}</p>
        <p><strong>Estatus:</strong> {{ $estudiante->estatus }}</p>
        <p><strong>Fecha Ingreso:</strong> {{ $estudiante->fecha_ingreso }}</p>
        <p><strong>Fecha Egreso:</strong> {{ $estudiante->fecha_egreso ?? '---' }}</p>
        <a href="{{ route('admin.estudiantes.index') }}" class="mt-4 inline-block text-blue-600">&larr; Volver al listado</a>
    </div>
</x-app-layout>
