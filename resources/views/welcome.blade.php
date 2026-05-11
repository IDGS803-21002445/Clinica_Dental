@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0">Bienvenido</h4>
                <small class="text-muted">Rol: {{ $rol ?? '—' }}</small>
            </div>
        </div>

        @if (session('success'))
            <x-adminlte-alert theme="success" title="OK" dismissable>
                {{ session('success') }}
            </x-adminlte-alert>
        @endif

        <div class="row">
            <div class="col-md-3 col-6">
                <x-adminlte-small-box title="{{ $metrics['total_pacientes'] ?? 0 }}" text="Pacientes"
                    icon="fas fa-user-injured" theme="info" url="{{ route('pacientes.index') }}" />
            </div>
            <div class="col-md-3 col-6">
                <x-adminlte-small-box title="{{ $metrics['total_citas'] ?? 0 }}" text="Citas"
                    icon="fas fa-calendar-alt" theme="primary" url="{{ route('citas.index') }}" />
            </div>
            <div class="col-md-3 col-6">
                <x-adminlte-small-box title="{{ $metrics['citas_pendientes'] ?? 0 }}" text="Citas pendientes"
                    icon="fas fa-clock" theme="warning" url="{{ route('citas.index') }}" />
            </div>
            <div class="col-md-3 col-6">
                <x-adminlte-small-box title="{{ $metrics['dentistas_activos'] ?? 0 }}" text="Dentistas"
                    icon="fas fa-user-md" theme="success" url="{{ route('dentistas.index') }}" />
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('Layouts.footer')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="js/Generales/Plugins/bootstrap-4.6.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="js/Generales/Plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="js/Generales/Plugins/sweetalert/sweetalert2.css">
    <link rel="stylesheet" href="js/Generales/Plugins/fontawesome-6.4.0/css/all.min.css">
    <link rel="stylesheet" href="js/Generales/Plugins/c3/docs/css/c3.css">
    <link rel="stylesheet" href="css/Generales/estilos.css">
@stop

@section('js')

    {{-- <script src="js/Generales/Plugins/jquery/jquery-3.7.0.js"></script>
    <script src="js/Generales/Plugins/bootstrap-4.6.2/js/bootstrap.min.js"></script> --}}
    <script src="js/Generales/Plugins/toastr/toastr.min.js"></script>
    <script src="js/Generales/Plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/Generales/Plugins/jquery-validation/additional-methods.js"></script>
    <script src="js/Generales/Plugins/sweetalert/sweetalert2.js" charset="UTF-8"></script>
    <script src="js/Generales/Plugins/fontawesome-6.4.0/js/all.min.js" charset="UTF-8"></script>
    <script src="js/Generales/Plugins/c3/docs/js/d3-5.8.2.min.js" charset="utf-8"></script>
    <script src="js/Generales/Plugins/c3/docs/js/c3.min.js"></script>
    <script src="js/Generales/Validaciones/PeticionAjax.js"></script>
    <script src="js/Generales/Dashboard.js"></script>
    @if (Auth::user()->Primer_Cambio_Contrasena == '1')
        <script>
            $("#modalPrimerCambioContrasena").modal("show");
            $("#modalPrimerCambioContrasena")
                .find(".modal-header")
                .html("<h5 class='m-0'>Cambiar contraseña</h5>");
        </script>
    @endif
@stop
