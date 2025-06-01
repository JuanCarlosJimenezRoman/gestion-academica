<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogSistema;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LogsExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LogController extends Controller
{
    private int $defaultPerPage = 15;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $logs = $this->buildLogQuery($request)
            ->paginate($request->per_page ?? $this->defaultPerPage)
            ->appends($request->query());

        return view('admin.logs.index', [
            'logs' => $logs,
            'users' => User::pluck('name', 'id'), // Para select de usuarios
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $log = LogSistema::with('usuario')
            ->findOrFail($id);

        return view('admin.logs.show', compact('log'));
    }

    /**
     * Search logs based on criteria
     */
    public function search(Request $request)
{
    dd($request->all());

    $query = LogSistema::with('usuario')
        ->orderBy('fecha', 'desc');

    if ($request->filled('accion')) {
        $query->where('accion', 'like', '%'.$request->accion.'%');
    }

    if ($request->filled('usuario')) {
        $query->where(function($q) use ($request) {
            // Buscar por ID de usuario si el input es numérico
            if (is_numeric($request->usuario)) {
                $q->where('id_usuario', $request->usuario);
            } else {
                // Buscar por nombre si el input no es numérico
                $q->whereHas('usuario', function($q) use ($request) {
                    $q->where('name', 'like', '%'.$request->usuario.'%');
                });
            }
        });
    }

    if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
        $query->whereBetween('fecha', [
            Carbon::parse($request->fecha_inicio)->startOfDay(),
            Carbon::parse($request->fecha_fin)->endOfDay()
        ]);
    }

    $logs = $query->paginate($request->per_page ?? $this->defaultPerPage)
        ->appends($request->query());

    return view('admin.logs.index', [
        'logs' => $logs,
        'searchParams' => $request->all()
    ]);
}

    /**
     * Export logs to Excel
     */
    public function export(Request $request): BinaryFileResponse
    {
        $logs = $this->buildLogQuery($request)->get();

        return Excel::download(new LogsExport($logs), 'logs-sistema-'.now()->format('Y-m-d').'.xlsx');
    }

    /**
     * Clean old logs
     */
    public function clean(Request $request)
    {
        $validated = $request->validate([
            'days' => 'required|integer|min:1|max:365'
        ]);

        $cutoffDate = Carbon::now()->subDays($validated['days']);
        $deletedCount = LogSistema::where('fecha', '<', $cutoffDate)->delete();

        return back()->with('success', "Se eliminaron {$deletedCount} registros anteriores a {$cutoffDate->format('d/m/Y')}");
    }

    /**
     * Build base query for logs with filters
     */
    // En LogController.php

/**
 * Build optimized log query with advanced filters
 */
private function buildLogQuery(Request $request)
{
    $query = LogSistema::with(['usuario' => function($query) {
            $query->select('id', 'name', 'email');
        }])
        ->select('logs_sistema.*')
        ->orderBy('fecha', 'desc');

    // Filtro por acción con búsqueda exacta o parcial
    if ($request->filled('accion')) {
        $query->where('accion', 'LIKE', '%'.$request->accion.'%');
    }

    // Filtro por usuario (ID, nombre o email)
    if ($request->filled('usuario')) {
        $searchTerm = $request->usuario;
        $query->where(function($q) use ($searchTerm) {
            if (is_numeric($searchTerm)) {
                $q->where('id_usuario', $searchTerm);
            } else {
                $q->whereHas('usuario', function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%$searchTerm%")
                      ->orWhere('email', 'LIKE', "%$searchTerm%");
                });
            }
        });
    }

    // Filtro por descripción (búsqueda de texto completo)
    if ($request->filled('descripcion')) {
        $query->where('descripcion', 'LIKE', '%'.$request->descripcion.'%');
    }

    // Filtro por rango de fechas optimizado
    if ($request->filled('fecha_inicio') || $request->filled('fecha_fin')) {
        $query->where(function($q) use ($request) {
            if ($request->filled('fecha_inicio')) {
                $q->where('fecha', '>=', Carbon::parse($request->fecha_inicio)->startOfDay());
            }
            if ($request->filled('fecha_fin')) {
                $q->where('fecha', '<=', Carbon::parse($request->fecha_fin)->endOfDay());
            }
        });
    }

    // Filtro por tipo de acción con select
    if ($request->filled('tipo_accion') && $request->tipo_accion !== 'todos') {
        $query->where('accion', 'LIKE', $request->tipo_accion.'%');
    }

    return $query;
}
}
