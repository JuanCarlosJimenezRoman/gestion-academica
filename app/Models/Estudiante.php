<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Estudiante extends Model
{
    use HasFactory;

    protected $primaryKey = 'num_control';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'num_control',
        'nombre',
        'curp',
        'correo',
        'id_reticula',
        'estatus',
        'fecha_ingreso',
        'fecha_egreso',
        'promedio'
    ];

    public function reticula()
{
    return $this->belongsTo(Reticula::class, 'id_reticula', 'id_reticula');
}


    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'num_control', 'num_control');
    }

    public function historial()
    {
        return $this->hasMany(Historial::class, 'num_control', 'num_control');
    }

    protected static function booted()
    {
        static::created(function ($estudiante) {
            // Crear usuario automáticamente al crear estudiante
            $user = \App\Models\User::create([
                'name' => $estudiante->nombre,
                'email' => $estudiante->correo,
                'password' => Hash::make($estudiante->curp), // Usar CURP como contraseña inicial
                'role' => 'Estudiante',
                'num_control' => $estudiante->num_control
            ]);
        });

        static::updated(function ($estudiante) {
            // Actualizar usuario si se modifica el estudiante
            if ($estudiante->user) {
                $estudiante->user->update([
                    'name' => $estudiante->nombre,
                    'email' => $estudiante->correo
                ]);
            }
        });

        static::deleted(function ($estudiante) {
            // Eliminar usuario si se elimina el estudiante (opcional)
            if ($estudiante->user) {
                $estudiante->user->delete();
            }
        });
    }

    public function user()
    {
        return $this->hasOne(User::class, 'num_control', 'num_control');
    }
}
