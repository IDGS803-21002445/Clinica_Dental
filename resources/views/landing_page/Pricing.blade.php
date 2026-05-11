@extends('landing_page._base')

@section('title', 'Precios - Prime Dental')

@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/pricing.css') }}">
@endpush

@section('content')

<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="hero-title">
            Precios transparentes y accesibles
        </h1>
        <p class="hero-text">
            Planes de tratamiento claros, con opciones flexibles adaptadas a tus necesidades.
        </p>
        @include('landing_page._cta_whatsapp', [
            'class' => 'btn hero-btn px-5 py-2',
            'label' => 'Reservar cita',
        ])
    </div>
</section>

<section class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Planes y tarifas orientativas</h2>
        <p class="text-muted">
            Elige el paquete que mejor encaje con tu revisión o tratamiento (precios de ejemplo).
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="price-card">
                <h5 class="fw-bold">Cuidado dental básico</h5>
                <p class="text-muted">Revisión y limpieza esenciales</p>
                <h2 class="price">60&nbsp;USD</h2>
                <ul class="price-list">
                    <li>✔ Exploración clínica</li>
                    <li>✔ Limpieza dental básica</li>
                    <li>✔ Consejos de higiene oral</li>
                    <li>✔ Radiografía si es necesaria</li>
                </ul>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn price-btn',
                    'label' => 'Elegir plan',
                    'whatsappMessage' => 'Hola, me interesa el plan Cuidado dental básico en Prime Dental.',
                ])
            </div>
        </div>

        <div class="col-md-4">
            <div class="price-card popular">
                <span class="badge-popular">Más popular</span>
                <h5 class="fw-bold">Cuidado dental avanzado</h5>
                <p class="text-muted">Periodoncia y restauración</p>
                <h2 class="price">120&nbsp;USD</h2>
                <ul class="price-list">
                    <li>✔ Raspaje y alisado radicular</li>
                    <li>✔ Obturaciones</li>
                    <li>✔ Sesión de tratamiento de encías</li>
                    <li>✔ Consulta de seguimiento</li>
                </ul>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn price-btn',
                    'label' => 'Elegir plan',
                    'whatsappMessage' => 'Hola, me interesa el plan Cuidado dental avanzado en Prime Dental.',
                ])
            </div>
        </div>

        <div class="col-md-4">
            <div class="price-card">
                <h5 class="fw-bold">Estética dental premium</h5>
                <p class="text-muted">Renovación de sonrisa</p>
                <h2 class="price">250&nbsp;USD</h2>
                <ul class="price-list">
                    <li>✔ Blanqueamiento profesional</li>
                    <li>✔ Valoración para carillas</li>
                    <li>✔ Consulta de diseño de sonrisa</li>
                    <li>✔ Simulación digital antes / después</li>
                </ul>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn price-btn',
                    'label' => 'Elegir plan',
                    'whatsappMessage' => 'Hola, me interesa el plan Estética dental premium en Prime Dental.',
                ])
            </div>
        </div>

    </div>
</section>

<section class="container my-5">
    <div class="row align-items-stretch g-0 no-gap">
        <div class="col-md-7">
            <div class="appointment-box p-5">
                <h3 class="fw-bold text-white">
                    ¿No sabes qué plan encaja contigo?
                </h3>
                <p class="text-white-50">
                    Reserva una consulta y te orientamos hacia la mejor opción clínica.
                </p>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn btn-light px-4 fw-semibold',
                    'label' => 'Reservar cita',
                ])
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('landing/img/picing.jpg') }}"
                class="equal-img" alt="Atención en clínica">
        </div>
    </div>
</section>

@endsection
