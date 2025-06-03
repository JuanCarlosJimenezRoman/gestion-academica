<?php

// app/Models/Grupo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Grupo extends Model
{
    protected $primaryKey = 'id_grupo';
    protected $fillable = [
        'clave_grupo',
        'clave_materia',
        'id_docente',
        'id_periodo',
        'id_aula',
        'horario',
        'capacidad_max'
    ];

    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'clave_materia', 'clave_materia');
    }

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class, 'id_docente', 'id_docente');
    }

    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'id_periodo', 'id_periodo');
    }

    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class, 'id_aula', 'id_aula');
    }

    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class, 'id_grupo', 'id_grupo');
    }

    public function getDisponibilidadAttribute(): string
    {
        $inscritos = $this->inscripciones()->count();
        $porcentaje = ($inscritos / $this->capacidad_max) * 100;

        return "$inscritos / $this->capacidad_max ($porcentaje%)";
    }
}
