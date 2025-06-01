<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos'; // nombre de la tabla
    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'estado'];
}
