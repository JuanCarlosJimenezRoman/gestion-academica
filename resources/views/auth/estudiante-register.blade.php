@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de Estudiante') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('estudiante.register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="num_control" class="col-md-4 col-form-label text-md-end">{{ __('Número de Control') }}</label>
                            <div class="col-md-6">
                                <input id="num_control" type="text" class="form-control @error('num_control') is-invalid @enderror" name="num_control" value="{{ old('num_control') }}" required autocomplete="num_control" autofocus>
                                @error('num_control')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Resto de campos del formulario -->
                        <!-- nombre, curp, correo, id_reticula, etc. -->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
