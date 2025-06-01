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
// use App\Models\User;
use Carbon\Carbon;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Periodo::insert([
        [
            'nombre' => 'Enero - Junio 2025',
            'fecha_inicio' => Carbon::parse('2025-01-10'),
            'fecha_fin' => Carbon::parse('2025-06-20'),
            'estado' => 'Activo'
        ],
        [
            'nombre' => 'Agosto - Diciembre 2024',
            'fecha_inicio' => Carbon::parse('2024-08-15'),
            'fecha_fin' => Carbon::parse('2024-12-15'),
            'estado' => 'Inactivo'
        ],
        [
            'nombre' => 'Enero - Junio 2024',
            'fecha_inicio' => Carbon::parse('2024-01-08'),
            'fecha_fin' => Carbon::parse('2024-06-20'),
            'estado' => 'Inactivo'
        ]
    ]);
}

}
