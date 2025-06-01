<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;
use App\Models\Docente;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Docente::insert([
        [
            'nombre' => 'Juan Pérez',
            'rfc' => 'JUAP750101ABC',
            'correo' => 'juan.perez@itexample.edu.mx',
            'departamento' => 'Sistemas y Computación',
            'especialidad' => 'Programación',
            'id_departamento' => 1,
            'estatus' => 'Activo'
        ],
        [
            'nombre' => 'Laura Gómez',
            'rfc' => 'GOLO820202MTR',
            'correo' => 'laura.gomez@itexample.edu.mx',
            'departamento' => 'Industrial',
            'especialidad' => 'Gestión de Calidad',
            'id_departamento' => 2,
            'estatus' => 'Activo'
        ],
        [
            'nombre' => 'Pedro Hernández',
            'rfc' => 'HEPE850505HOC',
            'correo' => 'pedro.hernandez@itexample.edu.mx',
            'departamento' => 'Eléctrica y Electrónica',
            'especialidad' => 'Sistemas Digitales',
            'id_departamento' => 3,
            'estatus' => 'Inactivo'
        ]
    ]);
}

}
