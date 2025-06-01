<?php

namespace App\Observers;

use App\Models\Estudiante;
use App\Models\LogSistema;

class EstudianteObserver
{
    public function created(Estudiante $estudiante)
    {
        $this->registrarLog('Creación de estudiante', "Estudiante creado: {$estudiante->nombre} ({$estudiante->num_control})");
    }

    public function updated(Estudiante $estudiante)
    {
        $this->registrarLog('Actualización de estudiante', "Estudiante actualizado: {$estudiante->nombre} ({$estudiante->num_control})");
    }

    public function deleted(Estudiante $estudiante)
    {
        $this->registrarLog('Eliminación de estudiante', "Estudiante eliminado: {$estudiante->nombre} ({$estudiante->num_control})");
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
