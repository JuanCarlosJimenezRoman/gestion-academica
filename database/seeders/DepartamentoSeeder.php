<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Departamento::insert([
        ['nombre' => 'Sistemas y Computación'],
        ['nombre' => 'Industrial'],
        ['nombre' => 'Eléctrica y Electrónica'],
        ['nombre' => 'Administración'],
        ['nombre' => 'Ciencias Básicas']
    ]);
}
}
