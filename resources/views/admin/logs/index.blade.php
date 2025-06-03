<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Listado de Logs del Sistema</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Encabezado y botón de búsqueda -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-700">Registros de Actividad</h3>
                        <!--<button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center" data-toggle="modal" data-target="#searchModal">
                            <i class="fas fa-search mr-2"></i> Buscar
                        </button>-->
                    </div>

                    <!-- Tabla de logs -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Log</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario (ID)</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
    @foreach($logs as $log)
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $log->id_log }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $log->fecha->format('d/m/Y H:i:s') }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $log->id_usuario ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                {{ $log->usuario ? $log->usuario->name.' (ID: '.$log->id_usuario.')' : 'Sistema (ID: n/a)' }}
            </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm {{ str_contains($log->accion, 'Eliminación') ? 'text-red-600' : 'text-green-600' }} font-medium">{{ $log->accion }}</td>
        <td class="px-6 py-4 text-sm text-gray-500">{{ $log->descripcion }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <a href="{{ route('admin.logs.show', $log->id_log) }}" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
            <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-copy"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">3</span> registros
                        </div>
                        <nav class="flex space-x-2">
                            <a href="#" class="px-3 py-1 rounded-md bg-gray-200 text-gray-600">&laquo; Anterior</a>
                            <a href="#" class="px-3 py-1 rounded-md bg-blue-600 text-white">1</a>
                            <a href="#" class="px-3 py-1 rounded-md bg-gray-200 text-gray-600">Siguiente &raquo;</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Búsqueda -->
    <!-- En tu archivo de vista -->
    <!--
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray-800 text-white">
                <h5 class="modal-title" id="searchModalLabel">Búsqueda Avanzada de Logs</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.logs.search') }}" method="GET">
                <div class="modal-body grid grid-cols-1 md:grid-cols-2 gap-4">


                    <div class="space-y-4">
                        <div>
                            <label for="tipo_accion" class="block text-sm font-medium text-gray-700">Tipo de Acción</label>
                            <select id="tipo_accion" name="tipo_accion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="todos">Todos los tipos</option>
                                <option value="Creación">Creación</option>
                                <option value="Actualización">Actualización</option>
                                <option value="Eliminación">Eliminación</option>
                                <option value="Login">Login</option>
                            </select>
                        </div>

                        <div>
                            <label for="accion" class="block text-sm font-medium text-gray-700">Acción específica</label>
                            <input type="text" id="accion" name="accion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Ej: Creación de usuario">
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Contenido en descripción</label>
                            <input type="text" id="descripcion" name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Palabras clave en la descripción">
                        </div>
                    </div>


                    <div class="space-y-4">
                        <div>
                            <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario (ID, nombre o email)</label>
                            <input type="text" id="usuario" name="usuario" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="ID, nombre o email del usuario">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Rango de fechas</label>
                            <div class="mt-1 grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div>
                                    <label for="fecha_inicio" class="block text-xs text-gray-500">Desde</label>
                                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="fecha_fin" class="block text-xs text-gray-500">Hasta</label>
                                    <input type="date" id="fecha_fin" name="fecha_fin" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="items_por_pagina" class="block text-sm font-medium text-gray-700">Items por página</label>
                            <select id="items_por_pagina" name="per_page" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="15">15 items</option>
                                <option value="30">30 items</option>
                                <option value="50">50 items</option>
                                <option value="100">100 items</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <i class="fas fa-search mr-2"></i> Buscar
                    </button>
                    <button type="reset" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <i class="fas fa-undo mr-2"></i> Limpiar
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
-->
    @push('styles')
    <style>
        .badge-admin {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .badge-system {
            background-color: #f3f4f6;
            color: #374151;
        }
        .action-eliminacion {
            color: #dc2626;
        }
        .action-creacion {
            color: #16a34a;
        }
    </style>
    @endpush
</x-app-layout>
