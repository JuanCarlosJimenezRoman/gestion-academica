<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reticula extends Model
{
    protected $table = 'reticulas';
    protected $primaryKey = 'id_reticula'; // <- Aquí está la solución
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'carrera',
        'plan_estudios',
        'fecha_inicio',
        'fecha_fin',
    ];
}
