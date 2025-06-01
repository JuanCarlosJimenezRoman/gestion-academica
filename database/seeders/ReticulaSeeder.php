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
// use App\Models\User;

class ReticulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Reticula::insert([
        [
            'carrera' => 'Ingeniería en Sistemas Computacionales',
            'plan_estudios' => '2020',
            'fecha_inicio' => '2020-08-01'
        ],
        [
            'carrera' => 'Ingeniería Industrial',
            'plan_estudios' => '2019',
            'fecha_inicio' => '2019-08-01'
        ]
    ]);
}

}
