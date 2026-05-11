@extends('adminlte::page')

@section('title', 'Nuevo usuario')

@section('content_header')
    <h1 class="mb-0">Nuevo usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Rol</label>
                    <select class="form-control @error('rol') is-invalid @enderror" name="rol">
                        <option value="admin" @selected(old('rol') === 'admin')>Admin</option>
                        <option value="dentista" @selected(old('rol') === 'dentista')>Dentista</option>
                        <option value="recepcionista" @selected(old('rol') === 'recepcionista')>Recepcionista</option>
                    </select>
                    @error('rol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop

