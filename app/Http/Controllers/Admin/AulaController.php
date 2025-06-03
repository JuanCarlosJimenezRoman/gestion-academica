<?php

// app/Http/Controllers/Admin/AulaController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::orderBy('nombre')->paginate(15);
        return view('admin.aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('admin.aulas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:20|unique:aulas,nombre',
            'capacidad' => 'required|integer|min:1|max:200',
            'ubicacion' => 'required|string|max:100',
            'tipo' => 'required|in:Aula,Laboratorio,Taller',
            'estatus' => 'required|in:Disponible,En mantenimiento'
        ]);

        Aula::create($validated);

        return redirect()->route('admin.aulas.index')
                         ->with('success', 'Aula creada exitosamente');
    }

    public function show(Aula $aula)
    {
        $aula->load('grupos.materia', 'grupos.docente', 'grupos.periodo');
        return view('admin.aulas.show', compact('aula'));
    }

    public function edit(Aula $aula)
    {
        return view('admin.aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:20|unique:aulas,nombre,'.$aula->id_aula.',id_aula',
            'capacidad' => 'required|integer|min:1|max:200',
            'ubicacion' => 'required|string|max:100',
            'tipo' => 'required|in:Aula,Laboratorio,Taller',
            'estatus' => 'required|in:Disponible,En mantenimiento'
        ]);

        $aula->update($validated);

        return redirect()->route('admin.aulas.index')
                         ->with('success', 'Aula actualizada exitosamente');
    }

    public function destroy(Aula $aula)
    {
        if($aula->grupos()->exists()) {
            return back()->with('error', 'No se puede eliminar, tiene grupos asignados');
        }

        $aula->delete();
        return redirect()->route('admin.aulas.index')
                         ->with('success', 'Aula eliminada exitosamente');
    }
}
