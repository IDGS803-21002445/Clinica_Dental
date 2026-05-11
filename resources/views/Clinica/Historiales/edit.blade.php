@extends('adminlte::page')

@section('title', 'Editar historial')

@section('content_header')
    <h1 class="mb-0">Editar historial</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('historiales.update', $historial) }}">
                @csrf
                @method('PUT')
                @include('Clinica.Historiales._form', ['historial' => $historial])
                <div class="d-flex justify-content-end">
                    <a href="{{ route('historiales.index') }}" class="btn btn-secondary mr-2">Volver</a>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

