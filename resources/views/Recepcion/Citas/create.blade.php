@extends('adminlte::page')

@section('title', 'Nueva cita')

@section('content_header')
    <h1 class="mb-0">Nueva cita</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('citas.store') }}">
                @include('Recepcion.Citas._form', ['cita' => null])
                <div class="d-flex justify-content-end">
                    <a href="{{ route('citas.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop

