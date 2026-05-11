@extends('adminlte::page')

@section('title', 'Editar paciente')

@section('content_header')
    <h1 class="mb-0">Editar paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pacientes.update', $paciente) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" />
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono', $paciente->telefono) }}" />
                    @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Correo</label>
                    <input class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo', $paciente->correo) }}" />
                    @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion', $paciente->direccion) }}" />
                    @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Fecha de nacimiento</label>
                    <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento', optional($paciente->fecha_nacimiento)->format('Y-m-d')) }}" />
                    @error('fecha_nacimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mr-2">Volver</a>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

