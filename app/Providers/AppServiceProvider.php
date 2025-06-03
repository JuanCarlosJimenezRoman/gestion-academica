<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\Grupo;
use App\Observers\MateriaObserver;
use App\Observers\LogSistemaObserver;
use App\Observers\EstudianteObserver;
use App\Observers\DocenteObserver;
use App\Observers\GrupoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Estudiante::observe(EstudianteObserver::class);
        Docente::observe(DocenteObserver::class);
        Materia::observe(MateriaObserver::class);
        Grupo::observe(GrupoObserver::class);
    }
}
