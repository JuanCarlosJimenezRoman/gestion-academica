<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $primaryKey = 'clave_materia';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'clave_materia',
        'nombre',
        'nombre_abreviado',
        'nivel',
        'tipo',
        'area_academica',
    ];
}
