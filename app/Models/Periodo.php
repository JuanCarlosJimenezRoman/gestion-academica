<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periodo extends Model
{
    use HasFactory;
    // O en Laravel 8+:
protected $primaryKey = 'id_periodo';
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];

    protected $table = 'periodos'; // nombre de la tabla
    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'estado'];
}
