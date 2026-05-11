@extends('landing_page._base')

@section('title', 'Servicios - Prime Dental')

@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/services.css') }}">
@endpush

@section('content')

<section class="hero-section">
    <div class="container text-center">
        <h1 class="hero-title">
            Atención dental profesional y moderna
        </h1>
        <p class="hero-text">
            Ofrecemos soluciones odontológicas avanzadas y de calidad para mantener tu sonrisa sana y radiante.
        </p>
        @include('landing_page._cta_whatsapp', [
            'class' => 'btn hero-btn px-5 py-2',
            'label' => 'Reservar cita',
        ])
    </div>
</section>

<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Nuestros servicios</h2>
        <p class="text-muted">Tratamientos completos con tecnología actual y un equipo especializado.</p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="service-card">
                <i class="bi bi-brightness-high" aria-hidden="true"></i>
                <h5>Estética dental</h5>
                <p>Blanqueamiento, carillas, diseño de sonrisa y más.</p>
                <a href="#" class="link-primary fw-semibold">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <i class="bi bi-braces" aria-hidden="true"></i>
                <h5>Ortodoncia</h5>
                <p>Aparatos fijos, alineadores y corrección de la mordida.</p>
                <a href="#" class="link-primary fw-semibold">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <i class="bi bi-brush" aria-hidden="true"></i>
                <h5>Higiene oral</h5>
                <p>Limpiezas profundas y tratamiento de encías.</p>
                <a href="#" class="link-primary fw-semibold">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <i class="bi bi-emoji-smile" aria-hidden="true"></i>
                <h5>Odontología general</h5>
                <p>Obturaciones, reconstrucciones y tratamiento de caries.</p>
                <a href="#" class="link-primary fw-semibold">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <i class="bi bi-hospital" aria-hidden="true"></i>
                <h5>Cirugía oral</h5>
                <p>Extracciones y procedimientos quirúrgicos con protocolos seguros.</p>
                <a href="#" class="link-primary fw-semibold">Saber más</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card">
                <i class="bi bi-capsule" aria-hidden="true"></i>
                <h5>Implantes dentales</h5>
                <p>Reemplazo fijo de piezas ausentes con implantes de titanio.</p>
                <a href="#" class="link-primary fw-semibold">Saber más</a>
            </div>
        </div>

    </div>
</section>

<section class="container my-5">
    <div class="row align-items-stretch g-0 no-gap">
        <div class="col-md-7">
            <div class="appointment-box p-5">
                <h3 class="fw-bold text-white">
                    Agenda una consulta presencial o en línea
                </h3>
                <p class="text-white-50">
                    Valoramos tu tiempo: ofrecemos valoración inicial y seguimiento personalizado.
                </p>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn btn-light px-4 fw-semibold',
                    'label' => 'Reservar cita',
                ])
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('landing/img/service.jpeg') }}"
                class="equal-img" alt="Consulta en clínica">
        </div>
    </div>
</section>

@endsection
