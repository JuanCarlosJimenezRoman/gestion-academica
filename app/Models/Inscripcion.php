<?php

// app/Models/Inscripcion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    protected $primaryKey = 'id_inscripcion';
    protected $fillable = ['num_control', 'id_grupo', 'estatus'];
    protected $casts = [
        'fecha_inscripcion' => 'datetime'
    ];

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'num_control', 'num_control');
    }

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id_grupo');
    }

    public function scopeActivas($query)
    {
        return $query->where('estatus', 'Inscrito');
    }
}
