<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detalle del Registro #{{ $log->id_log }}</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Información detallada</h6>
                <a href="{{ route('admin.logs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID del Log:</label>
                            <p class="form-control-static">{{ $log->id_log }}</p>
                        </div>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <p class="form-control-static">{{ $log->fecha->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Usuario:</label>
                            <p class="form-control-static">
                                @if($log->usuario)
                                    {{ $log->usuario->name }} (ID: {{ $log->id_usuario }})
                                @else
                                    Sistema (ID: n/a)
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Acción:</label>
                            <p class="form-control-static">{{ $log->accion }}</p>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea class="form-control" rows="5" readonly>{{ $log->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
