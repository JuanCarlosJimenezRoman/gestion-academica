<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Materia') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <div><strong>Clave:</strong> {{ $materia->clave_materia }}</div>
            <div><strong>Nombre:</strong> {{ $materia->nombre }}</div>
            <div><strong>Nombre Abreviado:</strong> {{ $materia->nombre_abreviado }}</div>
            <div><strong>Nivel:</strong> {{ $materia->nivel }}</div>
            <div><strong>Tipo:</strong> {{ $materia->tipo }}</div>
            <div><strong>Área Académica:</strong> {{ $materia->area_academica }}</div>

            <a href="{{ route('admin.materias.index') }}" class="btn btn-secondary mt-4 inline-block">Volver</a>
        </div>
    </div>
</x-app-layout>
