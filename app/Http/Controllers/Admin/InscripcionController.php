<?php

// app/Http/Controllers/Admin/InscripcionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Inscripcion, Grupo, Estudiante};
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with(['estudiante', 'grupo.materia', 'grupo.docente'])
                                  ->orderBy('fecha_inscripcion', 'desc')
                                  ->paginate(20);

        return view('admin.inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        $estudiantes = Estudiante::where('estatus', 'Regular')->get();
        $grupos = Grupo::with(['materia', 'docente', 'periodo'])
                     ->whereHas('periodo', fn($q) => $q->where('estado', 'Activo'))
                     ->get();

        return view('admin.inscripciones.create', compact('estudiantes', 'grupos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'num_control' => 'required|exists:estudiantes,num_control',
            'id_grupo' => 'required|exists:grupos,id_grupo'
        ]);

        // Validar cupo disponible
        $grupo = Grupo::withCount('inscripciones')->find($validated['id_grupo']);

        if ($grupo->inscripciones_count >= $grupo->capacidad_max) {
            return back()->withInput()
                         ->with('error', 'El grupo ha alcanzado su capacidad máxima');
        }

        // Validar que no esté ya inscrito
        if (Inscripcion::where('num_control', $validated['num_control'])
                      ->where('id_grupo', $validated['id_grupo'])
                      ->exists()) {
            return back()->withInput()
                         ->with('error', 'El estudiante ya está inscrito en este grupo');
        }

        Inscripcion::create($validated);

        return redirect()->route('admin.inscripciones.index')
                         ->with('success', 'Inscripción realizada exitosamente');
    }

    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();

        return redirect()->route('admin.inscripciones.index')
                         ->with('success', 'Inscripción eliminada exitosamente');
    }
}
