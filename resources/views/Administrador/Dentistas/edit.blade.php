@extends('adminlte::page')

@section('title', 'Editar dentista')

@section('content_header')
    <h1 class="mb-0">Editar dentista</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('dentistas.update', $dentista) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nombres</label>
                    <input class="form-control @error('nombres') is-invalid @enderror" name="nombres"
                        value="{{ old('nombres', $dentista->nombres) }}" />
                    @error('nombres')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"
                        value="{{ old('apellidos', $dentista->apellidos) }}" />
                    @error('apellidos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Especialidad</label>
                    <input class="form-control @error('especialidad') is-invalid @enderror" name="especialidad"
                        value="{{ old('especialidad', $dentista->especialidad) }}" />
                    @error('especialidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Usuario asociado (opcional)</label>
                    <select class="form-control @error('usuario_id') is-invalid @enderror" name="usuario_id">
                        <option value="">— Sin usuario —</option>
                        @foreach ($usuarios as $u)
                            <option value="{{ $u->id }}" @selected((string) old('usuario_id', $dentista->usuario_id) === (string) $u->id)>{{ $u->email }}</option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('dentistas.index') }}" class="btn btn-secondary mr-2">Volver</a>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

