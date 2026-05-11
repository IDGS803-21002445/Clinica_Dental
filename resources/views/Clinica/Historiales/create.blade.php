@extends('adminlte::page')

@section('title', 'Nuevo historial')

@section('content_header')
    <h1 class="mb-0">Nuevo historial</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('historiales.store') }}">
                @include('Clinica.Historiales._form', ['historial' => null])
                <div class="d-flex justify-content-end">
                    <a href="{{ route('historiales.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop

