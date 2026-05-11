@extends('adminlte::page')

@section('title', 'Historiales')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Historiales clínicos</h1>
        <a href="{{ route('historiales.create') }}" class="btn btn-success">Nuevo</a>
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
            <form class="form-inline" method="GET" action="{{ route('historiales.index') }}">
                <div class="form-group mr-2">
                    <label class="mr-2">Paciente</label>
                    <select name="paciente_id" class="form-control">
                        <option value="">— Todos —</option>
                        @foreach ($pacientes as $p)
                            <option value="{{ $p->id }}" @selected((string) $pacienteId === (string) $p->id)>{{ $p->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Filtrar</button>
            </form>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Paciente</th>
                        <th>Diagnóstico</th>
                        <th>Tratamiento</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($historiales as $h)
                        <tr>
                            <td>{{ optional($h->fecha)->format('Y-m-d') }}</td>
                            <td>{{ $h->paciente?->nombre ?? '—' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($h->diagnostico, 60) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($h->tratamiento, 60) }}</td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" title="Ver" href="{{ route('historiales.visualizar', $h) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{ route('historiales.edit', $h) }}">Editar</a>
                                <form class="d-inline" method="POST" action="{{ route('historiales.destroy', $h) }}"
                                    onsubmit="return confirm('¿Eliminar historial?');">
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
            {{ $historiales->links() }}
        </div>
    </div>
@stop

