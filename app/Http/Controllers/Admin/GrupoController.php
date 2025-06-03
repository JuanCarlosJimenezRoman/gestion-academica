<?php

// app/Http/Controllers/Admin/GrupoController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Grupo, Materia, Docente, Periodo, Aula};
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with(['materia', 'docente', 'periodo', 'aula'])
                     ->orderBy('id_periodo', 'desc')
                     ->paginate(15);

        return view('admin.grupos.index', compact('grupos'));
    }

    public function create()
    {
        $materias = Materia::orderBy('nombre')->get();
        $docentes = Docente::where('estatus', 'Activo')->get();
        $periodos = Periodo::where('estado', 'Activo')->get();
        $aulas = Aula::orderBy('nombre')->get();

        return view('admin.grupos.create', compact('materias', 'docentes', 'periodos', 'aulas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clave_materia' => 'required|exists:materias,clave_materia',
            'id_docente' => 'required|exists:docentes,id_docente',
            'id_periodo' => 'required|exists:periodos,id_periodo',
            'id_aula' => 'nullable|exists:aulas,id_aula',
            'horario' => 'required|string|max:255',
            'capacidad_max' => 'required|integer|min:1|max:50'
        ]);

        $grupo = Grupo::create($validated + [
            'clave_grupo' => $this->generarClaveGrupo($validated['clave_materia'], $validated['id_periodo'])
        ]);

        return redirect()->route('admin.grupos.index')
                         ->with('success', 'Grupo creado exitosamente');
    }

    public function show(Grupo $grupo)
    {
        $grupo->load(['materia', 'docente', 'periodo', 'aula', 'inscripciones.estudiante']);
        return view('admin.grupos.show', compact('grupo'));
    }

    public function edit(Grupo $grupo)
    {
        $materias = Materia::orderBy('nombre')->get();
        $docentes = Docente::where('estatus', 'Activo')->get();
        $periodos = Periodo::all();
        $aulas = Aula::orderBy('nombre')->get();

        return view('admin.grupos.edit', compact('grupo', 'materias', 'docentes', 'periodos', 'aulas'));
    }

    public function update(Request $request, Grupo $grupo)
{
    $validated = $request->validate([
        'clave_materia' => 'required|exists:materias,clave_materia',
        'id_docente' => 'required|exists:docentes,id_docente',
        'id_periodo' => 'required|exists:periodos,id_periodo',
        'id_aula' => 'nullable|exists:aulas,id_aula',
        'horario' => 'required|string|max:255',
        'capacidad_max' => 'required|integer|min:1|max:50'
    ]);

    // Debug: Verificar datos recibidos
    \Log::debug('Datos recibidos para actualización:', $validated);

    try {
        $grupo->update($validated);

        // Debug: Verificar datos después de actualizar
        \Log::debug('Grupo actualizado:', $grupo->toArray());

        return redirect()->route('admin.grupos.index')
                         ->with('success', 'Grupo actualizado exitosamente');
    } catch (\Exception $e) {
        \Log::error('Error al actualizar grupo: ' . $e->getMessage());
        return back()->with('error', 'Error al actualizar el grupo')->withInput();
    }
}

    public function destroy(Grupo $grupo)
    {
        if($grupo->inscripciones()->exists()) {
            return back()->with('error', 'No se puede eliminar, tiene estudiantes inscritos');
        }

        $grupo->delete();
        return redirect()->route('admin.grupos.index')
                         ->with('success', 'Grupo eliminado exitosamente');
    }

    protected function generarClaveGrupo($claveMateria, $periodoId)
    {
        $materia = Materia::find($claveMateria);
        $periodo = Periodo::find($periodoId);

        return substr($materia->nombre_abreviado, 0, 3) . '-' .
               substr($periodo->nombre, 2, 2) . '-' .
               strtoupper(substr(uniqid(), -4));
    }
}
