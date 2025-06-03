<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\AulaController;
use App\Http\Controllers\Admin\InscripcionController;

Route::aliasMiddleware('role', CheckRole::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de administrador
Route::prefix('admin')->middleware(['auth', 'role:Administrador'])->group(function () {
    // Dashboard de admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUDs
    // Inside your admin routes group
Route::resource('estudiantes', EstudianteController::class)->names([
    'index' => 'admin.estudiantes.index',
    'create' => 'admin.estudiantes.create',
    'store' => 'admin.estudiantes.store',
    'show' => 'admin.estudiantes.show',
    'edit' => 'admin.estudiantes.edit',
    'update' => 'admin.estudiantes.update',
    'destroy' => 'admin.estudiantes.destroy'
]);

    Route::resource('docentes', DocenteController::class)->names([
        'index' => 'admin.docentes.index',
        'create' => 'admin.docentes.create',
        'store' => 'admin.docentes.store',
        'show' => 'admin.docentes.show',
        'edit' => 'admin.docentes.edit',
        'update' => 'admin.docentes.update',
        'destroy' => 'admin.docentes.destroy'
    ]);
    Route::resource('materias', MateriaController::class)->names([
        'index' => 'admin.materias.index',
        'create' => 'admin.materias.create',
        'store' => 'admin.materias.store',
        'show' => 'admin.materias.show',
        'edit' => 'admin.materias.edit',
        'update' => 'admin.materias.update',
        'destroy' => 'admin.materias.destroy'
    ]);
    Route::resource('grupos', GrupoController::class)->names([
        'index' => 'admin.grupos.index',
        'create' => 'admin.grupos.create',
        'store' => 'admin.grupos.store',
        'show' => 'admin.grupos.show',
        'edit' => 'admin.grupos.edit',
        'update' => 'admin.grupos.update',
        'destroy' => 'admin.grupos.destroy'
    ]);
    Route::resource('aulas', AulaController::class)->names([
        'index' => 'admin.aulas.index',
        'create' => 'admin.aulas.create',
        'store' => 'admin.aulas.store',
        'show' => 'admin.aulas.show',
        'edit' => 'admin.aulas.edit',
        'update' => 'admin.aulas.update',
        'destroy' => 'admin.aulas.destroy'
    ]);

    Route::resource('inscripciones', InscripcionController::class)->names([
        'index' => 'admin.inscripciones.index',
        'create' => 'admin.inscripciones.create',
        'store' => 'admin.inscripciones.store',
        'show' => 'admin.inscripciones.show',
        'edit' => 'admin.inscripciones.edit',
        'update' => 'admin.inscripciones.update',
        'destroy' => 'admin.inscripciones.destroy'
    ]);

    // Logs del sistema
    Route::prefix('logs')->group(function () {
        Route::get('/', [LogController::class, 'index'])->name('admin.logs.index');
        Route::get('/{id}', [LogController::class, 'show'])->name('admin.logs.show');
        Route::get('/search', [LogController::class, 'search'])->name('admin.logs.search');
        Route::get('/export', [LogController::class, 'export'])->name('admin.logs.export');
        Route::post('/clean', [LogController::class, 'clean'])->name('admin.logs.clean');
    });
});

/*
Route::prefix('Desarrollador')->middleware(['auth', 'role:Desarrollador'])->group(function () {
    Route::get('/desarrollador/dashboard', function () {
        return view('desarrollador.dashboard');
    })->name('desarrollador.dashboard');
});
*/
Route::prefix('doc')->middleware(['auth', 'role:Docente'])->group(function () {
    Route::get('/dashboard', function () {
        return view('docente.dashboard');
    })->name('docente.dashboard');
});

Route::prefix('est')->middleware(['auth', 'role:Estudiante'])->group(function () {
    Route::get('/dashboard', function () {
        return view('estudiante.dashboard');
    })->name('estudiante.dashboard');
});

require __DIR__.'/auth.php';
