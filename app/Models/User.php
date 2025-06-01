<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'id_docente',
        'num_control'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //Relaciones
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'num_control', 'num_control');
    }

    /// Métodos para verificar roles
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    public function isAdmin()
    {
        return $this->hasRole('Administrador') || $this->hasRole('Desarrollador');
    }
    public function isDocente()
    {
        return $this->hasRole('Docente');
    }
    public function isEstudiante()
    {
        return $this->hasRole('Estudiante');
    }
}
