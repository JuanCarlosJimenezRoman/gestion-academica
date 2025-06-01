{{-- resources/views/admin/estudiantes/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Listado de Estudiantes</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.estudiantes.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar Estudiante</a>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">No. Control</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Correo</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $estudiante->num_control }}</td>
                    <td class="px-4 py-2">{{ $estudiante->nombre }}</td>
                    <td class="px-4 py-2">{{ $estudiante->correo }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.estudiantes.show', $estudiante) }}" class="text-blue-600">Ver</a> |
                        <a href="{{ route('admin.estudiantes.edit', $estudiante) }}" class="text-yellow-600">Editar</a> |
                        <form action="{{ route('admin.estudiantes.destroy', $estudiante) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('¿Eliminar estudiante?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
