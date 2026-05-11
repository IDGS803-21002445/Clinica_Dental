@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
    <h1 class="mb-0">Editar cita</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('citas.update', $cita) }}">
                @csrf
                @method('PUT')
                @include('Recepcion.Citas._form', ['cita' => $cita])
                <div class="d-flex justify-content-end">
                    <a href="{{ route('citas.index') }}" class="btn btn-secondary mr-2">Volver</a>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

