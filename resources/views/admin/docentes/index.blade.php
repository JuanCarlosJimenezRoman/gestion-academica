<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Docentes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.docentes.create') }}" class="btn btn-primary mb-4">Nuevo Docente</a>

                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th>RFC</th>
                            <th>Nombre</th>
                            <th>Especialidad</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as $docente)
                            <tr>
                                <td>{{ $docente->rfc }}</td>
                                <td>{{ $docente->nombre }}</td>
                                <td>{{ $docente->especialidad }}</td>
                                <td>{{ $docente->telefono }}</td>
                                <td>{{ $docente->email }}</td>
                                <td class="space-x-2">
                                    <a href="{{ route('admin.docentes.show', $docente->rfc) }}" class="text-blue-600 hover:underline">Ver</a>
                                    <a href="{{ route('admin.docentes.edit', $docente->rfc) }}" class="text-yellow-600 hover:underline">Editar</a>
                                    <form action="{{ route('admin.docentes.destroy', $docente->rfc) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar docente?');">
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
                    {{ $docentes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
