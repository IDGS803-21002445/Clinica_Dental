@extends('landing_page._base')

@section('title', 'Por qué nosotros - Prime Dental')

@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/whyus.css') }}">
@endpush

@section('content')
<!-- sección hero -->
<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="hero-title">
            ¿Por Qué Elegir Prime Dental?
        </h1>
        <p class="hero-text">
            Brindamos atención dental confiable, compasiva y de alta calidad
            para garantizar tu comodidad y confianza.
        </p>
        @include('landing_page._cta_whatsapp', [
            'class' => 'btn hero-btn px-5 py-2',
            'label' => 'Reservar cita',
        ])
    </div>
</section>

<!-- sección por qué elegirnos -->
<section class="container py-5">
    <div class="row align-items-center g-4">
        <!-- Columna de la Imagen -->
        <div class="col-md-5">
            <img src="{{ asset('landing/img/whyus.jpg') }}" class="why-img" alt="Por qué elegir Prime Dental">
        </div>

        <!-- Columna del Texto -->
        <div class="col-md-7">
            <h2 class="fw-bold mb-2">¿Por Qué Elegir Prime Dental?</h2>
            <p class="text-muted mb-3">
                En Prime Dental, nos enfocamos en brindar una atención dental precisa, cómoda y
                de alta calidad utilizando tecnología moderna y estándares médicos experimentados.
                Nuestro equipo trabaja con esmero y transparencia para proporcionar planes de
                tratamiento personalizados y un entorno clínico amigable donde los pacientes se sientan
                seguros, confiados y apoyados durante todo su proceso dental.
            </p>

            <ul class="why-list">
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Dentistas certificados y altamente calificados
                </li>
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Tecnología moderna y equipo dental avanzado
                </li>
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Experiencia de tratamiento amigable y centrada en el paciente
                </li>
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Planes de tratamiento accesibles y citas flexibles
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- contenedor de cita -->
<section class="container my-5">
    <div class="row align-items-stretch g-0 no-gap">
        <!-- Columna del Texto (Con Fondo y Círculos) -->
        <div class="col-md-7">
            <div class="appointment-box p-5">
                <h3 class="fw-bold text-white">
                    Tu Sonrisa es Nuestra Prioridad
                </h3>
                <p class="text-white-50">
                    Reserva tu visita y deja que nuestro equipo cuide de tu salud dental.
                </p>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn btn-light px-4 fw-semibold',
                    'label' => 'Reservar cita',
                ])
            </div>
        </div>

        <!-- Columna de la Imagen -->
        <div class="col-md-5">
            <img src="{{ asset('landing/img/whyusapp.jpeg') }}" class="equal-img" alt="Cita en Prime Dental">
        </div>
    </div>
</section>
@endsection