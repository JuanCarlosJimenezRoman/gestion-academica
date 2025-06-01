<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Periodo;
use Illuminate\Support\Carbon;
use App\Models\Reticula;
use App\Models\Materia;
// use App\Models\User;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Materia::insert([
        [
            'clave_materia' => 'IS101',
            'nombre' => 'Fundamentos de Programación',
            'nombre_abreviado' => 'ProgFund',
            'nivel' => 1,
            'tipo' => 'Base',
            'area_academica' => 'Programación'
        ],
        [
            'clave_materia' => 'IS201',
            'nombre' => 'Estructura de Datos',
            'nombre_abreviado' => 'ED',
            'nivel' => 2,
            'tipo' => 'Base',
            'area_academica' => 'Programación'
        ],
        [
            'clave_materia' => 'IS301',
            'nombre' => 'Base de Datos',
            'nombre_abreviado' => 'BD',
            'nivel' => 3,
            'tipo' => 'Base',
            'area_academica' => 'Sistemas'
        ]
    ]);
}

}
