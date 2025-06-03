<?php

// app/Http/Controllers/Admin/CalificacionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{HistorialAcademico, Inscripcion, Grupo};
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function create(Grupo $grupo)
    {
        $grupo->load(['inscripciones.estudiante', 'materia', 'periodo']);

        return view('admin.calificaciones.create', compact('grupo'));
    }

    public function store(Request $request, Grupo $grupo)
    {
        $request->validate([
            'calificaciones.*.valor' => 'required|numeric|min:0|max:10',
            'calificaciones.*.tipo' => 'required|in:Ordinario,Extraordinario,Especial'
        ]);

        foreach ($request->calificaciones as $inscripcionId => $data) {
            HistorialAcademico::updateOrCreate(
                [
                    'num_control' => $data['num_control'],
                    'clave_materia' => $grupo->clave_materia,
                    'id_periodo' => $grupo->id_periodo
                ],
                [
                    'calificacion' => $data['valor'],
                    'tipo_eval' => $data['tipo'],
                    'fecha_eval' => now()
                ]
            );
        }

        return redirect()->route('admin.grupos.show', $grupo->id_grupo)
                         ->with('success', 'Calificaciones registradas exitosamente');
    }
}
