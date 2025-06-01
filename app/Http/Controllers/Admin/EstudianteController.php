<?php

namespace App\Http\Controllers\Admin;

use App\Models\Estudiante;
use App\Models\Reticula;
use App\Models\Inscripcion;
use App\Models\Historial;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('reticula')->paginate(10);
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reticulas = Reticula::all();
        return view('admin.estudiantes.create', compact('reticulas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'num_control' => 'required|unique:estudiantes|max:10',
        'nombre' => 'required|max:100',
        'curp' => 'required|size:18|unique:estudiantes',
        'correo' => 'required|email|unique:estudiantes',
        'id_reticula' => 'required|exists:reticulas,id_reticula',
        'estatus' => 'required|in:Regular,Baja temporal,Egresado',
        'fecha_ingreso' => 'required|date',
        'fecha_egreso' => 'nullable|date|after:fecha_ingreso',
    ]);

    Estudiante::create($validatedData);

    return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        return view('admin.estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        $reticulas = Reticula::all();
        return view('admin.estudiantes.edit', compact('estudiante', 'reticulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'curp' => 'required|size:18|unique:estudiantes,curp,'.$estudiante->num_control.',num_control',
            'correo' => 'required|email|unique:estudiantes,correo,'.$estudiante->num_control.',num_control',
            'id_reticula' => 'required|exists:reticulas,id_reticula',
            'estatus' => 'required|in:Regular,Baja temporal,Egresado',
            'fecha_ingreso' => 'required|date',
            'fecha_egreso' => 'nullable|date|after:fecha_ingreso',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('admin.estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante, User $user)
    {
        $estudiante->delete();
        return redirect()->route('admin.estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
    }
}
