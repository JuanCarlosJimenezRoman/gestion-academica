<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Materias') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.materias.create') }}" class="btn btn-primary mb-4">Nueva Materia</a>

                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Abreviado</th>
                            <th>Nivel</th>
                            <th>Tipo</th>
                            <th>Área Académica</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materias as $materia)
                            <tr>
                                <td>{{ $materia->clave_materia }}</td>
                                <td>{{ $materia->nombre }}</td>
                                <td>{{ $materia->nombre_abreviado }}</td>
                                <td>{{ $materia->nivel }}</td>
                                <td>{{ $materia->tipo }}</td>
                                <td>{{ $materia->area_academica }}</td>
                                <td class="space-x-2">
                                    <a href="{{ route('admin.materias.show', $materia->clave_materia) }}" class="text-blue-600 hover:underline">Ver</a>
                                    <a href="{{ route('admin.materias.edit', $materia->clave_materia) }}" class="text-yellow-600 hover:underline">Editar</a>
                                    <form action="{{ route('admin.materias.destroy', $materia->clave_materia) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar materia?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $materias->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
