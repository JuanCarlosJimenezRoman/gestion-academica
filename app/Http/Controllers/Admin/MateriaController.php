<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Materia;
use App\Model\Docente;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::paginate(10);
        return view('admin.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.materias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'clave_materia' => 'required|string|max:10|unique:materias,clave_materia',
            'nombre' => 'required|string|max:100',
            'nombre_abreviado' => 'nullable|string|max:20',
            'nivel' => 'nullable|integer|min:0',
            'tipo' => 'nullable|in:Base,Optativa,Especialidad,Extra',
            'area_academica' => 'nullable|string|max:50'
        ]);

        Materia::create($request->all());
        return redirect()->route('admin.materias.index')->with('success', 'Materia creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materia = Materia::findOrFail($id);
        return view('admin.materias.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materia = Materia::findOrFail($id);
        return view('admin.materias.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materia = Materia::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'nombre_abreviado' => 'nullable|string|max:20',
            'nivel' => 'nullable|integer|min:0',
            'tipo' => 'nullable|in:Base,Optativa,Especialidad,Extra',
            'area_academica' => 'nullable|string|max:50'
        ]);

        $materia->update($request->all());
        return redirect()->route('admin.materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
        return redirect()->route('admin.materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
