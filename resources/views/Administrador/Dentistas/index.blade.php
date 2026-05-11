@extends('adminlte::page')

@section('title', 'Dentistas')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Dentistas</h1>
        <a href="{{ route('dentistas.create') }}" class="btn btn-success">Nuevo</a>
    </div>
@stop

@section('content')
    @if (session('success'))
        <x-adminlte-alert theme="success" title="OK" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Usuario asociado</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dentistas as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->nombres }} {{ $d->apellidos }}</td>
                            <td>{{ $d->especialidad ?? '—' }}</td>
                            <td>{{ $d->usuario?->email ?? '—' }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('dentistas.edit', $d) }}">Editar</a>
                                <form class="d-inline" method="POST" action="{{ route('dentistas.destroy', $d) }}"
                                    onsubmit="return confirm('¿Eliminar dentista?');">
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
            {{ $dentistas->links() }}
        </div>
    </div>
@stop

