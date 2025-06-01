<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LogSistema extends Model
{
    protected $table = 'logs_sistema';
    protected $primaryKey = 'id_log';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'accion',
        'descripcion',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function scopeRecent($query, $days = 7)
    {
        return $query->where('fecha', '>=', now()->subDays($days));
    }

    public function scopeActionType($query, $type)
    {
        return $query->where('accion', 'like', $type.'%');
    }
}
