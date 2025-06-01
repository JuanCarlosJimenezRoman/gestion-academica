<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle del Docente') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <div><strong>RFC:</strong> {{ $docente->rfc }}</div>
            <div><strong>Nombre:</strong> {{ $docente->nombre }}</div>
            <div><strong>Especialidad:</strong> {{ $docente->especialidad }}</div>
            <div><strong>Teléfono:</strong> {{ $docente->telefono }}</div>
            <div><strong>Email:</strong> {{ $docente->email }}</div>

            <a href="{{ route('docentes.index') }}" class="btn btn-secondary mt-4 inline-block">Volver</a>
        </div>
    </div>
</x-app-layout>
