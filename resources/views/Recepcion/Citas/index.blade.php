@extends('adminlte::page')

@section('title', 'Citas')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.css" onerror="this.remove()">
<style>
    /* FullCalendar v6: el CSS principal suele ir por paquetes; si el link falla, estos estilos evitan desbordes raros */
    .agenda-citas-page {
        max-width: 100%;
        min-width: 0;
    }
    .agenda-citas-page .agenda-citas-card {
        max-width: 100%;
        overflow: hidden;
    }
    .agenda-citas-page .agenda-citas-body {
        min-width: 0;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: visible;
        -webkit-overflow-scrolling: touch;
    }
    .agenda-citas-page #calendar {
        min-height: 520px;
    }
    .agenda-citas-page .fc {
        max-width: 100%;
    }
    .agenda-citas-page .fc .fc-scrollgrid {
        border-radius: 0.25rem;
    }
</style>
@endsection

@section('content_header')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.addEventListener('DOMContentLoaded', async function() {
        let response = await fetch('/api/citas/calendario', {
            headers: {
                'Authorization':
                    'Bearer ' + localStorage.getItem('token'),
                'Accept': 'application/json'
            }
        });
        let citas = await response.json();
        let frm = document.getElementById('formulario');
        let calendarEl = document.getElementById('calendar');
        let myModal = new bootstrap.Modal(document.getElementById('myModal'));
        let eliminar = document.getElementById('btnEliminar');
        eliminar.addEventListener('click', function(){

            Swal.fire({
                title: 'Advertencia?',
                text: "Esta seguro de eliminar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    let formEliminar =
                    document.getElementById('formEliminar');

                    let id =
                        document.getElementById('id').value;

                    formEliminar.action = `/citas/${id}`;

                    formEliminar.submit();
                    }
            })
        });
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'timeGridWeek',
          locale: 'es',
          slotMinTime: '09:00:00',
          slotMaxTime: '20:00:00',
          events: citas,
        dateClick: async function (info) {
            frm.reset();
            frm.action = "{{ route('citas.store') }}";
            document.getElementById('method_field').innerHTML = '';
            eliminar.classList.add('d-none');
            document.getElementById('start').value = info.dateStr.substring(0,16);
            document.getElementById('id').value = '';
            document.getElementById('btnAccion').textContent = 'Registrar';
            document.getElementById('titulo').textContent = 'Registrar Cita';
            await cargarPacientes()
            await cargarDentistas()
            myModal.show();
        },
        eventClick: async function (info) {
            frm.action = `/citas/${info.event.id}`;
            document.getElementById('method_field').innerHTML =
                '<input type="hidden" name="_method" value="PUT">';
            document.getElementById('id').value = info.event.id;
            document.getElementById('title').value = info.event.title;
            document.getElementById('start').value = info.event.startStr.substring(0,16);
            document.getElementById('btnAccion').textContent = 'Modificar';
            document.getElementById('titulo').textContent = 'Actualizar Cita';
            await cargarPacientes()
            await cargarDentistas()
            document.getElementById('paciente').value = info.event.extendedProps.paciente;
            document.getElementById('dentista').value = info.event.extendedProps.dentista;
            document.getElementById('estatus').value = info.event.extendedProps.estatus;
            eliminar.classList.remove('d-none');
            myModal.show();
        },
          businessHours: [
            {
                daysOfWeek: [ 1, 2, 3, 4, 5 ],
                startTime: '09:00',
                endTime: '20:00'
            },
            {
                daysOfWeek: [ 6 ],
                startTime: '09:00',
                endTime: '15:00'
            }
            ],
        
        })
        calendar.render()
      })

      async function cargarPacientes(){
        let response = await fetch('/api/citas/pacientes', {
            headers: {
                'Authorization':
                    'Bearer ' + localStorage.getItem('token'),
                'Accept': 'application/json'
            }
        });
        let pacientes = await response.json();
        let select = document.getElementById('paciente');
        select.textContent = "";
        pacientes.forEach(p => {
            let option = document.createElement('option');
            option.value = p.id;
            option.textContent =
                'Nombre: ' + p.nombre + ' Tel: ' + p.telefono;
            select.appendChild(option);
        });
      }
      
      async function cargarDentistas(){
        let response = await fetch('/api/citas/dentistas', {
            headers: {
                'Authorization':
                    'Bearer ' + localStorage.getItem('token'),
                'Accept': 'application/json'
            }
        });
        let dentistas = await response.json();
        let select = document.getElementById('dentista');
        select.textContent = "";
        dentistas.forEach(d => {
            let option = document.createElement('option');
            option.value = d.id;
            option.textContent =
                d.nombres + ' ' + d.apellidos;
            select.appendChild(option);
        });
      }

    </script>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Citas</h1>
    </div>
@stop

@section('content')
    @if (session('success'))
        <x-adminlte-alert theme="success" title="OK" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
    @endif
        <div id='calendar'></div>
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="titulo">Registro de Citas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formulario" action="{{ route('citas.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div id="method_field"></div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <label for="motivo">Motivo de la cita</label>
                                    <input type="hidden" id="id" name="id">
                                    <input id="title" type="text" class="form-control" name="motivo" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <label for="paciente_id">Paciente</label>
                                    <select name="paciente_id" id="paciente" class="form-control" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <label for="dentista_id">Dentista</label>
                                    <select name="dentista_id" id="dentista" class="form-control" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <label for="estatus">Estatus</label>
                                    <select name="estatus" id="estatus" class="form-control" required>
                                        <option value="">Seleccione uno</option>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="confirmada">Confirmada</option>
                                        <option value="completada">Completada</option>
                                        <option value="cancelada">Cancelada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <label for="notas">Notas</label>
                                    <textarea name="notas" id="notas" class="form-control">

                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <label for="" class="form-label">Fecha</label>
                                    <input class="form-control" id="start" type="datetime-local" name="fecha_hora" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                        <button type="submit" class="btn btn-primary" id="btnAccion">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <form id="formEliminar" method="POST">

        @csrf

        @method('DELETE')

    </form>
@stop

