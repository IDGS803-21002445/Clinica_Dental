@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-success">Nuevo</a>
    </div>
@stop

@section('content')
    @if (session('success'))
        <x-adminlte-alert theme="success" title="OK" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
    @endif

    <div class="card">
        <div class="card-body">
            <form class="form-inline" method="GET" action="{{ route('pacientes.index') }}">
                <div class="input-group">
                    <input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Buscar por nombre/teléfono/correo" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pacientes as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td>{{ $p->telefono ?? '—' }}</td>
                            <td>{{ $p->correo ?? '—' }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('pacientes.edit', $p) }}">Editar</a>
                                <form class="d-inline" method="POST" action="{{ route('pacientes.destroy', $p) }}"
                                    onsubmit="return confirm('¿Eliminar paciente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted p-4">Sin registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pacientes->links() }}
        </div>
    </div>
@stop

