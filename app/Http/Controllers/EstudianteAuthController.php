<?php
// app/Http/Controllers/EstudianteAuthController.php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class EstudianteAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.estudiante-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'num_control' => 'required|unique:estudiantes',
            'nombre' => 'required|string|max:255',
            'curp' => 'required|string|size:18|unique:estudiantes',
            'correo' => 'required|string|email|max:255|unique:estudiantes',
            'id_reticula' => 'required|exists:reticulas,id',
        ]);

        // Crear estudiante (que automáticamente creará el usuario)
        $estudiante = Estudiante::create([
            'num_control' => $request->num_control,
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'correo' => $request->correo,
            'id_reticula' => $request->id_reticula,
        ]);

        // Opcional: enviar correo con instrucciones para cambiar contraseña
        // ...

        return redirect()->route('login')->with('success', 'Registro exitoso. Usa tu número de control y CURP para iniciar sesión.');
    }
    // En EstudianteAuthController.php
    public function login(Request $request)
    {
        $credentials = $request->only('num_control', 'password');

        if (Auth::attempt(['num_control' => $credentials['num_control'], 'password' => $credentials['password']])) {
            // Autenticación exitosa
            return redirect()->intended('/estudiante/dashboard');
        }

        return back()->withErrors([
            'num_control' => 'Credenciales incorrectas',
        ]);
    }
}
