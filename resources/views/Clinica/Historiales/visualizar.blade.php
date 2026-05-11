@extends('adminlte::page')

@section('title', 'Historial clínico')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>
        <h1 class="font-weight-bold mb-0">
            Historial clínico
        </h1>

        <small class="text-muted">
            Información general del paciente
        </small>
    </div>

    <a href="{{ route('historiales.index') }}"
       class="btn btn-secondary shadow-sm">

        <i class="fas fa-arrow-left mr-1"></i>
        Volver

    </a>

</div>

@stop

@section('content')

<div class="row">

    {{-- PERFIL PACIENTE --}}
    <div class="col-md-3">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <img src="{{ asset('img/user.png') }}"
                     class="img-fluid rounded-circle shadow mb-3"
                     width="120">

                <h4 class="font-weight-bold">

                    {{ $historial->paciente->nombre }}

                </h4>

                <p class="text-muted">

                    Paciente registrado

                </p>

                <hr>

                <div class="text-left">

                    <p>

                        <i class="fas fa-phone text-primary mr-2"></i>

                        {{ $historial->paciente->telefono ?? 'Sin teléfono' }}

                    </p>

                    <p>

                        <i class="fas fa-envelope text-danger mr-2"></i>

                        {{ $historial->paciente->correo ?? 'Sin correo' }}

                    </p>

                    <p>

                        <i class="fas fa-map-marker-alt text-success mr-2"></i>

                        {{ $historial->paciente->direccion ?? 'Sin dirección' }}

                    </p>

                    <p class="mb-0">

                        <i class="fas fa-calendar text-warning mr-2"></i>

                        Registro:

                        {{ $historial->paciente->created_at?->format('d/m/Y') }}

                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTENIDO --}}
    <div class="col-md-9">

        {{-- RESUMEN --}}
        <div class="row">

            <div class="col-md-4">

                <div class="small-box bg-info shadow">

                    <div class="inner">

                        <h3>

                            {{ $historial->paciente->citas->count() }}

                        </h3>

                        <p>Total de citas</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-calendar-check"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="small-box bg-success shadow">

                    <div class="inner">

                        <h3>

                            {{ $historial->paciente->historiales->count() }}

                        </h3>

                        <p>Historiales registrados</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-notes-medical"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="small-box bg-warning shadow">

                    <div class="inner">

                        <h3 style="font-size: 22px">

                            {{ \Carbon\Carbon::parse($historial->fecha)->format('d/m/Y') }}

                        </h3>

                        <p>Última atención</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-stethoscope"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- INFORMACIÓN MÉDICA --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0 font-weight-bold">

                    <i class="fas fa-file-medical-alt text-primary mr-2"></i>

                    Información médica

                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <div class="border rounded p-3 bg-light h-100">

                            <h6 class="font-weight-bold text-danger">

                                Diagnóstico

                            </h6>

                            <p class="mb-0">

                                {{ $historial->diagnostico }}

                            </p>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="border rounded p-3 bg-light h-100">

                            <h6 class="font-weight-bold text-success">

                                Tratamiento

                            </h6>

                            <p class="mb-0">

                                {{ $historial->tratamiento }}

                            </p>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="border rounded p-3 bg-light">

                            <h6 class="font-weight-bold text-primary">

                                Observaciones

                            </h6>

                            <p class="mb-0">

                                {{ $historial->observaciones ?? 'Sin observaciones registradas.' }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- CITAS --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0 font-weight-bold">

                    <i class="fas fa-calendar-alt text-success mr-2"></i>

                    Historial de citas

                </h5>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover mb-0">

                    <thead class="bg-light">

                        <tr>

                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($citas as $cita)

                            <tr>

                                <td>

                                    {{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y') }}

                                </td>

                                <td>

                                    {{ \Carbon\Carbon::parse($cita->fecha_hora)->format('h:i A') }}

                                </td>

                                <td>

                                    @if ($cita->estado == 'Programada')

                                        <span class="badge badge-primary">

                                            {{ $cita->estado }}

                                        </span>

                                    @elseif($cita->estado == 'Pendiente')

                                        <span class="badge badge-warning">

                                            {{ $cita->estado }}

                                        </span>

                                    @else

                                        <span class="badge badge-success">

                                            {{ $cita->estado }}

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3"
                                    class="text-center text-muted">

                                    No hay citas registradas

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@stop

@section('css')

<style>

.card{
    border-radius:15px;
}

.small-box{
    border-radius:15px;
}

</style>

@stop