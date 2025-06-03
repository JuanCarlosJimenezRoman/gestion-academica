<?php

namespace App\Observers;

use App\Models\Grupo;
use App\Models\LogSistema;

class GrupoObserver
{
    public function created(Grupo $grupo)
    {
        $this->registrarLog(
            'Creación de grupo',
            "Grupo creado: {$grupo->clave_grupo} - " .
            "Materia: {$grupo->materia->nombre} - " .
            "Docente: {$grupo->docente->nombre}"
        );
    }

    public function updated(Grupo $grupo)
    {
        $this->registrarLog(
            'Actualización de grupo',
            "Grupo actualizado: {$grupo->clave_grupo} - " .
            "Capacidad: {$grupo->capacidad_max} - " .
            "Horario: {$grupo->horario}"
        );
    }

    public function deleted(Grupo $grupo)
    {
        $this->registrarLog(
            'Eliminación de grupo',
            "Grupo eliminado: {$grupo->clave_grupo} - " .
            "Materia: {$grupo->materia->nombre}"
        );
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
