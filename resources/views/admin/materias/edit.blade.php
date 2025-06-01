<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Materia') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('materias.update', $materia->clave_materia) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.materias.partials.form')
                <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
                <a href="{{ route('materias.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
