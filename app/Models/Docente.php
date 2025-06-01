<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Docente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_docente';

    protected $fillable = [
        'nombre',
        'rfc',
        'correo',
        'departamento',
        'especialidad',
        'id_departamento',
        'estatus',
    ];
}
