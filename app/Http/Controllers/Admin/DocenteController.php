<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Docente;
use App\Models\Departamento;


class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::paginate(10); // o el número de registros por página que desees

        return view('admin.docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $departamentos = Departamento::all();
    return view('admin.docentes.create', compact('departamentos'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'rfc' => 'required|string|max:13|unique:docentes,rfc',
            'correo' => 'nullable|email|max:100',
            'departamento' => 'nullable|string|max:50',
            'especialidad' => 'nullable|string|max:100',
            'id_departamento' => 'nullable|exists:departamentos,id_departamento',
            'estatus' => 'in:Activo,Inactivo'
        ]);

        Docente::create($request->all());
        return redirect()->route('admin.docentes.index')->with('success', 'Docente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $docente = Docente::findOrFail($id);
        return view('admin.docentes.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $docente = Docente::findOrFail($id);            $departamentos = Departamento::all();
        return view('admin.docentes.edit', compact('docente', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $docente = Docente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'rfc' => 'required|string|max:13|unique:docentes,rfc,' . $docente->id_docente . ',id_docente',
            'correo' => 'nullable|email|max:100',
            'departamento' => 'nullable|string|max:50',
            'especialidad' => 'nullable|string|max:100',
            'id_departamento' => 'nullable|exists:departamentos,id_departamento',
            'estatus' => 'in:Activo,Inactivo'
        ]);

        $docente->update($request->all());
        return redirect()->route('admin.docentes.index')->with('success', 'Docente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
        return redirect()->route('admin.docentes.index')->with('success', 'Docente eliminado correctamente.');
    }
}
