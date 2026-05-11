@extends('landing_page._base')

@section('title', 'Equipo - Prime Dental')

@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/team.css') }}">
@endpush

@section('content')

<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="hero-title">
            Conoce a nuestro equipo dental
        </h1>
        <p class="hero-text">
            Profesionales altamente cualificados, unidos por la excelencia clínica y el trato humano.
        </p>
        @include('landing_page._cta_whatsapp', [
            'class' => 'btn hero-btn px-5 py-2',
            'label' => 'Reservar cita',
        ])
    </div>
</section>

<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Equipo médico</h2>
        <p class="text-muted">
            Odontólogos, ortodoncistas y cirujanos maxilofaciales de confianza.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="team-card">
                <img src="{{ asset('landing/img/team1.png') }}"
                    class="team-img" alt="Dra. especialista en ortodoncia">
                <h5 class="mt-3 fw-bold">Dra. Ana Martínez</h5>
                <p class="text-muted">Especialista en ortodoncia</p>
                <a href="#" class="team-link">Ver perfil</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-card">
                <img src="{{ asset('landing/img/team2.png') }}"
                    class="team-img" alt="Dr. estética dental">
                <h5 class="mt-3 fw-bold">Dr. Carlos Ruiz</h5>
                <p class="text-muted">Estética dental</p>
                <a href="#" class="team-link">Ver perfil</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-card">
                <img src="{{ asset('landing/img/team3.png') }}"
                    class="team-img" alt="Dr. cirugía oral">
                <h5 class="mt-3 fw-bold">Dr. Luis Herrera</h5>
                <p class="text-muted">Cirugía oral e implantología</p>
                <a href="#" class="team-link">Ver perfil</a>
            </div>
        </div>

    </div>
</section>

<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">¿Por qué nuestro equipo?</h2>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="why-team-box">
                <i class="bi bi-patch-check-fill" aria-hidden="true"></i>
                <h5 class="fw-bold mt-2">Titulación y experiencia</h5>
                <p class="text-muted">
                    Especialistas colegiados con amplia trayectoria en las distintas áreas de la odontología.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="why-team-box">
                <i class="bi bi-heart-pulse-fill" aria-hidden="true"></i>
                <h5 class="fw-bold mt-2">Atención centrada en ti</h5>
                <p class="text-muted">
                    Priorizamos tu comodidad, la información clara y un ambiente respetuoso en cada visita.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="why-team-box">
                <i class="bi bi-people-fill" aria-hidden="true"></i>
                <h5 class="fw-bold mt-2">Trabajo multidisciplinar</h5>
                <p class="text-muted">
                    Coordinamos diagnóstico y tratamiento entre especialistas para resultados coherentes.
                </p>
            </div>
        </div>

    </div>
</section>

<section class="container my-5">
    <div class="row align-items-stretch g-0 no-gap">
        <div class="col-md-7">
            <div class="appointment-box p-5">
                <h3 class="fw-bold text-white">
                    ¿Necesitas una valoración?
                </h3>
                <p class="text-white-50">
                    Reserva con uno de nuestros odontólogos y recibe un plan personalizado.
                </p>
                @include('landing_page._cta_whatsapp', [
                    'class' => 'btn btn-light px-4 fw-semibold',
                    'label' => 'Reservar cita',
                ])
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('landing/img/teamappo.jpeg') }}"
                class="equal-img" alt="Equipo en consulta">
        </div>
    </div>
</section>

@endsection
