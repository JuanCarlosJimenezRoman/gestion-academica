<?php

// app/Models/HistorialAcademico.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialAcademico extends Model
{
    protected $primaryKey = 'id_historial';
    protected $fillable = [
        'num_control',
        'clave_materia',
        'calificacion',
        'tipo_eval',
        'fecha_eval',
        'id_periodo'
    ];

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'num_control', 'num_control');
    }

    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'clave_materia', 'clave_materia');
    }

    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'id_periodo', 'id_periodo');
    }

    public function getAprobadoAttribute(): bool
    {
        return $this->calificacion >= 6.0;
    }
}
