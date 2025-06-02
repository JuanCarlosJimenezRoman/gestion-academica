<?php

namespace App\Observers;

use App\Models\Materia;
use App\Models\LogSistema;

class MateriaObserver
{
    public function created(Materia $materia)
    {
        $this->registrarLog('Creación de materia', "Materia creado: {$materia->nombre} ({$materia->num_control})");
    }

    public function updated(Materia $materia)
    {
        $this->registrarLog('Actualización de materia', "Materia actualizado: {$materia->nombre} ({$materia->num_control})");
    }

    public function deleted(Materia $materia)
    {
        $this->registrarLog('Eliminación de materia', "Materia eliminado: {$materia->nombre} ({$materia->num_control})");
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
