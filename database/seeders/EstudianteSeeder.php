<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;
use App\Models\Docente;
use App\Models\Estudiante;
// use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Estudiante::insert([
        [
            'num_control' => '2019012345',
            'nombre' => 'Ana Martínez',
            'curp' => 'MAAA990101HDFRNN00',
            'correo' => 'ana.martinez@itexample.edu.mx',
            'id_reticula' => 1,
            'estatus' => 'Regular',
            'fecha_ingreso' => '2019-08-15',
            'promedio' => 89.5
        ],
        [
            'num_control' => '2020023456',
            'nombre' => 'Luis Ramírez',
            'curp' => 'RALU000201HOCMSA09',
            'correo' => 'luis.ramirez@itexample.edu.mx',
            'id_reticula' => 1,
            'estatus' => 'Regular',
            'fecha_ingreso' => '2020-08-15',
            'promedio' => 91.2
        ],
        [
            'num_control' => '2021034567',
            'nombre' => 'Carmen Torres',
            'curp' => 'TOCA010101MDFLRS03',
            'correo' => 'carmen.torres@itexample.edu.mx',
            'id_reticula' => 1,
            'estatus' => 'Baja temporal',
            'fecha_ingreso' => '2021-08-15',
            'promedio' => 78.3
        ]
    ]);
}
}
