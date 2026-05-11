@extends('adminlte::page')

@section('title', 'Nuevo recepcionista')

@section('content_header')
    <h1 class="mb-0">Nuevo recepcionista</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('recepcionistas.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nombres</label>
                    <input class="form-control @error('nombres') is-invalid @enderror" name="nombres"
                        value="{{ old('nombres') }}" />
                    @error('nombres')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"
                        value="{{ old('apellidos') }}" />
                    @error('apellidos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Usuario asociado (opcional)</label>
                    <select class="form-control @error('usuario_id') is-invalid @enderror" name="usuario_id">
                        <option value="">— Sin usuario —</option>
                        @foreach ($usuarios as $u)
                            <option value="{{ $u->id }}" @selected((string) old('usuario_id') === (string) $u->id)>{{ $u->email }}</option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('recepcionistas.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop

