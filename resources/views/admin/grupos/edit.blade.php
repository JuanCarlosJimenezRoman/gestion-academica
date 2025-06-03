<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Grupo') }}: {{ $grupo->clave_grupo }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-6">
            <form action="{{ route('admin.grupos.update', $grupo->id_grupo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Campo Materia -->
                    <div>
                        <x-input-label for="clave_materia" value="Materia"/>
                        <select name="clave_materia" id="clave_materia" required
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($materias as $materia)
                                <option value="{{ $materia->clave_materia }}"
                                    @selected(old('clave_materia', $grupo->clave_materia) == $materia->clave_materia)>
                                    {{ $materia->clave_materia }} - {{ $materia->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('clave_materia')" class="mt-2"/>
                    </div>

                    <!-- Campo Docente -->
                    <div>
                        <x-input-label for="id_docente" value="Docente"/>
                        <select name="id_docente" id="id_docente" required
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($docentes as $docente)
                                <option value="{{ $docente->id_docente }}"
                                    @selected(old('id_docente', $grupo->id_docente) == $docente->id_docente)>
                                    {{ $docente->rfc }} - {{ $docente->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_docente')" class="mt-2"/>
                    </div>

                    <!-- Campo Periodo -->
                    <div>
                        <x-input-label for="id_periodo" value="Periodo"/>
                        <select name="id_periodo" id="id_periodo" required
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($periodos as $periodo)
                                <option value="{{ $periodo->id_periodo }}"
                                    @selected(old('id_periodo', $grupo->id_periodo) == $periodo->id_periodo)>
                                    {{ $periodo->nombre }} ({{ $periodo->fecha_inicio->format('d/m/Y') }} - {{ $periodo->fecha_fin->format('d/m/Y') }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_periodo')" class="mt-2"/>
                    </div>

                    <!-- Campo Aula -->
                    <div>
                        <x-input-label for="id_aula" value="Aula (Opcional)"/>
                        <select name="id_aula" id="id_aula"
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Sin aula asignada</option>
                            @foreach($aulas as $aula)
                                <option value="{{ $aula->id_aula }}"
                                    @selected(old('id_aula', $grupo->id_aula) == $aula->id_aula)>
                                    {{ $aula->nombre }} (Capacidad: {{ $aula->capacidad }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Campo Horario -->
                    <div>
                        <x-input-label for="horario" value="Horario"/>
                        <x-text-input id="horario" name="horario" type="text" class="mt-1 block w-full"
                                      placeholder="Ej: Lunes 10:00-12:00, Miércoles 09:00-11:00"
                                      value="{{ old('horario', $grupo->horario) }}" required/>
                        <x-input-error :messages="$errors->get('horario')" class="mt-2"/>
                    </div>

                    <!-- Campo Capacidad Máxima -->
                    <div>
                        <x-input-label for="capacidad_max" value="Capacidad Máxima"/>
                        <x-text-input id="capacidad_max" name="capacidad_max" type="number" min="1" max="50"
                                      class="mt-1 block w-full"
                                      value="{{ old('capacidad_max', $grupo->capacidad_max) }}" required/>
                        <x-input-error :messages="$errors->get('capacidad_max')" class="mt-2"/>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('admin.grupos.show', $grupo->id_grupo) }}"
                       class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                        Cancelar
                    </a>
                    <x-primary-button>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                        </svg>
                        Actualizar Grupo
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
