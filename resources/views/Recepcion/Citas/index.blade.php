@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Citas</h1>
        <a href="{{ route('citas.create') }}" class="btn btn-success">Nueva</a>
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
                        <th>Fecha</th>
                        <th>Paciente</th>
                        <th>Dentista</th>
                        <th>Estatus</th>
                        <th>Motivo</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($citas as $c)
                        <tr>
                            <td>{{ optional($c->fecha_hora)->format('Y-m-d H:i') }}</td>
                            <td>{{ $c->paciente?->nombre ?? '—' }}</td>
                            <td>{{ $c->dentista ? ($c->dentista->nombres . ' ' . $c->dentista->apellidos) : '—' }}</td>
                            <td><span class="badge badge-secondary">{{ $c->estatus }}</span></td>
                            <td>{{ $c->motivo ?? '—' }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('citas.edit', $c) }}">Editar</a>
                                <form class="d-inline" method="POST" action="{{ route('citas.destroy', $c) }}"
                                    onsubmit="return confirm('¿Eliminar cita?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted p-4">Sin registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $citas->links() }}
        </div>
    </div>
@stop

