@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    {{-- <h1>Administrador</h1> --}}
    @include('Layouts.header', ['nombreModulo' => "Usuarios"])

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')
    @include('Layouts.cierreSesionInactividad')
    @include('Layouts.loader')

    @php
        $permisoPagina = false; // Valor predeterminado en caso de que no se cumpla ninguna condición
    @endphp
    {{-- @foreach (session('permisos') as $moduloID => $permisos) --}}
        {{-- @if ($moduloID == 1) {{-- Debes colocar el id del modulo --}}
            {{--//Variable para saber si tiene permiso al modulo
            @php
                $permisoPagina = true; 
            @endphp --}}
            
                {{-- Botones que aparecen en el encabezado para eliminar o agregar registros --}}
                <div class="d-flex justify-content-end mb-2">

                    {{-- @foreach ($permisos as $permiso)
                        @if ($permiso == 'Eliminar') --}}
                          {{-- Si el permiso es eliminar que lo muestre --}}
                            {{-- Botones que aparecen en el encabezado para eliminar o agregar registros --}}
                            <x-adminlte-button label="Eliminar Masivo" id="btnEliminarMasivoAlumno"
                                class="bg-danger" icon="fa-solid fa-trash-can" title="Borrar todos los elementos seleccionados" />
                            {{--  Boton para eliminar en masivo  --}}
                        {{-- @elseif ($permiso == 'Insertar') --}}
                         {{-- Si el permiso es Insertar, que permita mostrarlo --}}
                            <x-adminlte-button label="Nuevo" data-toggle="modal" id="btnNuevoAlumno" data-target="#"
                                class="bg-green mr-2" icon="fa-solid fa-plus" title="Agregar un Alumno nuevo" />
                            {{--  Boton para agregar un nuevo registro  --}}
                        {{-- @endif
                    @endforeach --}}
                </div>

                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Registros de Alumnos</h3>
                    </div>
                    <div class="card-body" id="show">

                        <h1 class="text-center text-secondary my-5"><i class="fa fa-spin fa-spinner"></i> Cargando...</h1>
                    </div>
                </div>

                {{-- Modal para agregar un nuevo registro --}}
                <x-adminlte-modal id="modalCustom" size="xl" class="ml-auto" theme="dark" icon="fa-circle-plus"
                    v-centered static-backdrop scrollable>
                    <form id="registro-alumno">
                        @csrf
                        <div style="height:375px;">
                            <div class="row">
                                <div class="d-none">
                                    <x-adminlte-input name="Id_Alumno" label="Id_Alumno"
                                        placeholder="Id_Alumno" id="Id_Alumno" type="text"
                                        fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    <x-adminlte-input name="Id_Usuario" label="Id_Usuario" placeholder="Id_Usuario"
                                        id="Id_Usuario" type="text" fgroup-class="col-md-12 mb-2" disabled
                                        disable-feedback />
                                    <x-adminlte-input name="Id_Persona" label="Id_Persona" placeholder="Id_Persona"
                                        id="Id_Persona" type="text" fgroup-class="col-md-12 mb-2" disabled
                                        disable-feedback />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="d-block mb-0">
                                        <x-adminlte-input name="Nombres" label="*Nombres" placeholder="Ej. Juan" id="Nombres"
                                            type="text" fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-block mb-0">
                                        <x-adminlte-input name="Apellido_Paterno" id="Apellido_Paterno"
                                            label="*Apellido Paterno" placeholder="Ej. Perez" type="text"
                                            fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-block mb-0">
                                        <x-adminlte-input name="Apellido_Materno" id="Apellido_Materno"
                                            label="*Apellido Materno" placeholder="Ej. Perez" type="text"
                                            fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="d-block mb-0">
                                        <x-adminlte-input name="Email" id="Email" label="*Email"
                                            placeholder="Ej. alguien@example.com" type="text"
                                            fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="d-block mb-0">
                                        <x-adminlte-input name="Telefono_Personal" id="Telefono_Personal"
                                            label="*Teléfono Personal" placeholder="Ej. 123456789" type="text"
                                            fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="d-block mb-0">
                                        <x-adminlte-input name="Matricula" id="Matricula"
                                            label="*Matricula" placeholder="Ej. 21000000" type="text"
                                            fgroup-class="col-md-12 mb-2" disabled disable-feedback />
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-2 d-block">
                                    {{-- <div class="d-block mb-0"> --}}
                                        {{-- <label for="grupos" class="">*Grupos</label>
                                        <select name="Grupo" id="Grupo" class="form-control">
                                            <option disabled selected>Selecciona un grupo</option>
                                            @foreach ($grupos as $grupo)
                                                <option value="{{$grupo->Id_Area}}">{{$grupo->Nombre_Area}}</option>
                                            @endforeach
                                        </select> --}}

                                    {{-- </div> 
                                </div> --}}
                            </div>
                            <x-slot name="footerSlot">
                                <x-adminlte-button theme="danger" class="ml-auto" label="Cerrar" 
                                    id="btnCerrarModal" icon="fa-regular fa-circle-xmark fa-lg"/>
                                <x-adminlte-button class="btn-flat" type="submit" id="btnEditar" 
                                    label="Editar" theme="primary" form="registro-alumno" 
                                    icon="fa-regular fa-pen-to-square fa-lg"/>
                                <x-adminlte-button class="btn-flat" id="btnAgregar" type="submit" 
                                    label="Agregar" theme="success" form="registro-alumno" 
                                    icon="fa-regular fa-floppy-disk fa-lg"/>
                            </x-slot>
                            <p id="mensaje_obligatorio" class="font-italic my-2 " style="color: rgb(184, 30, 30)">Los campos con * son obligatorios</p>
                        </div>
                    </form>
                </x-adminlte-modal>
                {{-- Fin de modal para agregar un registro --}}
        {{-- @endif --}}
    {{-- @endforeach --}}

    {{-- @if ($permisoPagina == false) --}}
        {{-- Función para redirigir al usuario si no tiene este módulo --}}
        {{-- <script>
            window.location.href = "{{ route('error.index') }}";
        </script>
    @endif --}}
 
@stop

@section('footer')

    @include('Layouts.footer')

@stop

@section('css')
    {{-- <link rel="stylesheet" href="js/Generales/Plugins/bootstrap-4.6.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="js/Generales/Plugins/datatables-1.13.4/jquery.dataTables.min.css">
    <link rel="stylesheet" href="js/Generales/Plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="js/Generales/Plugins/sweetalert/sweetalert2.css">
    <link rel="stylesheet" href="js/Generales/Plugins/fontawesome-6.4.0/css/all.min.css">
    <link rel="stylesheet" href="js/Generales/Plugins/animate-css/animatecss.css" />
    <link rel="stylesheet" href="css/Generales/estilos.css">

@stop

@section('js')
    {{-- <script src="js/Generales/Plugins/jquery/jquery-3.7.0.js"></script>
    <script src="js/Generales/Plugins/bootstrap-4.6.2/js/bootstrap.min.js"></script> --}}
    <script src="js/Generales/Plugins/datatables-1.13.4/jquery.dataTables.min.js"></script>
    <script src="js/Generales/Plugins/toastr/toastr.min.js"></script>
    <script src="js/Generales/Plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/Generales/Plugins/jquery-validation/additional-methods.js"></script>
    <script src="js/Generales/Plugins/sweetalert/sweetalert2.js" charset="UTF-8"></script>
    <script src="js/Generales/prime-dental-alerts.js" charset="UTF-8"></script>
    <script src="js/Generales/Validaciones/PeticionAjax.js"></script>
    <script src="js/Administrador/Alumnos.js"></script>

 
@stop
