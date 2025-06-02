<?php

namespace App\Observers;

use App\Models\Docente;
use App\Models\LogSistema;

class DocenteObserver
{
    public function created(Docente $docente)
    {
        $this->registrarLog('Creación de docente', "Docente creado: {$docente->nombre} ({$docente->num_control})");
    }

    public function updated(Docente $docente)
    {
        $this->registrarLog('Actualización de docente', "Docente actualizado: {$docente->nombre} ({$docente->num_control})");
    }

    public function deleted(Docente $docente)
    {
        $this->registrarLog('Eliminación de docente', "Docente eliminado: {$docente->nombre} ({$docente->num_control})");
    }

    protected function registrarLog($accion, $descripcion)
    {
        LogSistema::create([
            'id_usuario' => auth()->id(),
            'accion' => $accion,
            'descripcion' => $descripcion,
            'fecha' => now()
        ]);
    }
}
