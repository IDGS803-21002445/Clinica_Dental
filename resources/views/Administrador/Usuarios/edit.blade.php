@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h1 class="mb-0">Editar usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email', $usuario->email) }}" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Rol</label>
                    <select class="form-control @error('rol') is-invalid @enderror" name="rol">
                        <option value="admin" @selected(old('rol', $usuario->rol) === 'admin')>Admin</option>
                        <option value="dentista" @selected(old('rol', $usuario->rol) === 'dentista')>Dentista</option>
                        <option value="recepcionista" @selected(old('rol', $usuario->rol) === 'recepcionista')>Recepcionista</option>
                    </select>
                    @error('rol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nueva contraseña (opcional)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mr-2">Volver</a>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

