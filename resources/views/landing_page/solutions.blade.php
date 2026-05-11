@extends('landing_page._base')

@section('title', 'Soluciones dentales - Prime Dental')

@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/Dentalsolutions.css') }}">
@endpush

@section('content')

<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="hero-title">
            Soluciones y tratamientos integrales
        </h1>
        <p class="hero-text">
            Abordamos un amplio espectro de problemas bucodentales con protocolos fiables y actualizados.
        </p>
        @include('landing_page._cta_whatsapp', [
            'class' => 'btn hero-btn px-5 py-2',
            'label' => 'Reservar cita',
        ])
    </div>
</section>

<section class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Soluciones por problema</h2>
        <p class="text-muted">
            Opciones de tratamiento eficaces para las consultas más frecuentes.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="solution-card">
                <div class="solution-icon">
                    <i class="bi bi-emoji-frown" aria-hidden="true"></i>
                </div>
                <h5 class="fw-bold">Caries y restauración</h5>
                <p>
                    Obturaciones y reconstrucciones que preservan la estructura dental y evitan complicaciones.
                </p>
                <a href="#" class="solution-link">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="solution-card">
                <div class="solution-icon">
                    <i class="bi bi-bandaid" aria-hidden="true"></i>
                </div>
                <h5 class="fw-bold">Enfermedad periodontal</h5>
                <p>
                    Raspajes, mantenimiento de encías y terapia para frenar la pérdida de soporte óseo.
                </p>
                <a href="#" class="solution-link">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="solution-card">
                <div class="solution-icon">
                    <i class="bi bi-braces" aria-hidden="true"></i>
                </div>
                <h5 class="fw-bold">Malposición dental</h5>
                <p>
                    Ortodoncia con brackets o alineadores para mejorar mordida y alineación estética.
                </p>
                <a href="#" class="solution-link">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="solution-card">
                <div class="solution-icon">
                    <i class="bi bi-emoji-dizzy" aria-hidden="true"></i>
                </div>
                <h5 class="fw-bold">Sensibilidad dental</h5>
                <p>
                    Tratamientos desensibilizantes y refuerzo del esmalte para reducir molestias al comer o beber frío.
                </p>
                <a href="#" class="solution-link">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="solution-card">
                <div class="solution-icon">
                    <i class="bi bi-emoji-smile" aria-hidden="true"></i>
                </div>
                <h5 class="fw-bold">Mejora estética de la sonrisa</h5>
                <p>
                    Blanqueamiento, carillas y contorneado estético para armonizar forma y color.
                </p>
                <a href="#" class="solution-link">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="solution-card">
                <div class="solution-icon">
                    <i class="bi bi-hospital" aria-hidden="true"></i>
                </div>
                <h5 class="fw-bold">Implantes y ausencia dental</h5>
                <p>
                    Implantes o prótesis sobre implante para recuperar función y aspecto natural al hablar y sonreír.
                </p>
                <a href="#" class="solution-link">Saber más</a>
            </div>
        </div>

    </div>

</section>

<section class="container my-5">
    <div class="row align-items-stretch g-0 no-gap">
        <div class="col-md-7">
            <div class="appointment-box p-5">
                <h3 class="fw-bold text-white">
                    ¿No estás seguro de qué tratamiento necesitas?
                </h3>
                <p class="text-white-50">
                    Agenda una valoración: estudiamos tu caso y te proponemos la solución más adecuada.
                </p>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn btn-light px-4 fw-semibold',
                    'label' => 'Reservar cita',
                ])
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('landing/img/solutions1.jpg') }}"
                class="equal-img" alt="Plan de tratamiento dental">
        </div>
    </div>
</section>

@endsection
