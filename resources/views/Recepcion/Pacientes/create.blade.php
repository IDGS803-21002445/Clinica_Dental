@extends('adminlte::page')

@section('title', 'Nuevo paciente')

@section('content_header')
    <h1 class="mb-0">Nuevo paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pacientes.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" />
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" />
                    @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Correo</label>
                    <input class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" />
                    @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" />
                    @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Fecha de nacimiento</label>
                    <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento') }}" />
                    @error('fecha_nacimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop

