<?php

// app/Models/Aula.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aula extends Model
{
    protected $primaryKey = 'id_aula';
    protected $fillable = [
        'nombre',
        'capacidad',
        'ubicacion',
        'tipo', // Ej: 'Aula', 'Laboratorio', 'Taller'
        'estatus' // 'Disponible', 'En mantenimiento'
    ];

    protected $casts = [
        'capacidad' => 'integer'
    ];

    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class, 'id_aula', 'id_aula');
    }

    // Accesor para mostrar información combinada
    public function getInformacionCompletaAttribute(): string
    {
        return "{$this->nombre} - {$this->ubicacion} (Capacidad: {$this->capacidad})";
    }
}
