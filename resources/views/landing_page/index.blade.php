@extends('landing_page._base')

@section('title', 'Inicio - Prime Dental')

@section('content')

<!-- Hero -->
<section class="hero-modern">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="hero-title">
                    Atención dental profesional y moderna
                </h1>

                <p class="hero-desc">
                    Tratamientos de alta calidad, tecnología avanzada y un equipo
                    médico cercano — para que logres una sonrisa sana y con confianza.
                </p>

                <div class="d-flex gap-3 mt-3">
                    <a class="btn hero-btn px-4" href="{{ route('services') }}">Ver servicios</a>
                </div>

                <div class="hero-rating mt-4">
                    <span class="rating-value">4.9★</span>
                    <span class="rating-text">Valoración de satisfacción de pacientes</span>
                </div>

            </div>

            <div class="col-md-6 position-relative">
                <img src="{{ asset('landing/img/heroimg.png') }}"
                    class="hero-img" alt="Atención dental Prime Dental">
            </div>

        </div>
    </div>
</section>

<!-- Barra de cita rápida -->
<section class="container appointment-bar">

    <div class="row g-4 align-items-end">

        <div class="col-md-2">
            <label class="form-label fw-semibold" for="appointment-name">Nombre</label>
            <input type="text" class="form-control form-field" id="appointment-name"
                placeholder="Tu nombre" autocomplete="name">
        </div>

        <div class="col-md-2">
            <label class="form-label fw-semibold" for="appointment-email">Correo</label>
            <input type="email" class="form-control form-field" id="appointment-email"
                placeholder="tu@correo.com" autocomplete="email">
        </div>

        <div class="col-md-2">
            <label class="form-label fw-semibold" for="appointment-service">Servicio</label>
            <select class="form-select form-field" id="appointment-service" aria-label="Tipo de servicio">
                <option value="">Selecciona un servicio</option>
                <option>Limpieza dental</option>
                <option>Implantes dentales</option>
                <option>Ortodoncia</option>
                <option>Estética dental</option>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label fw-semibold" for="appointment-date">Fecha</label>
            <input type="date" class="form-control form-field" id="appointment-date">
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="button" class="btn make-btn w-100" id="appointment-whatsapp-btn"
                data-phone="{{ config('landing.whatsapp_phone_e164') }}">
                Pedir cita (WhatsApp)
            </button>
        </div>

    </div>

</section>

<!-- Características -->
<section class="container py-5 features-grid" data-aos="fade-up">

    <div class="row g-4">

        <div class="col-md-4 feature-col" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-item">
                <i class="bi bi-stars feature-icon" aria-hidden="true"></i>
                <h5>Limpieza dental avanzada</h5>
                <p>Limpieza ultrasónica cómoda y segura.</p>
            </div>
        </div>

        <div class="col-md-4 feature-col" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-item">
                <i class="bi bi-person-lines-fill feature-icon" aria-hidden="true"></i>
                <h5>Primera consulta sin coste</h5>
                <p>Revisión inicial y plan de tratamiento incluidos.</p>
            </div>
        </div>

        <div class="col-md-4 feature-col" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-item">
                <i class="bi bi-search-heart feature-icon" aria-hidden="true"></i>
                <h5>Revisión preventiva</h5>
                <p>Exploración diagnóstica y consejos de higiene oral.</p>
            </div>
        </div>

    </div>

</section>

<!-- Testimonio -->
<section class="container my-5" data-aos="fade-right">

    <div class="row align-items-center testimonial-box">

        <div class="col-md-6">
            <img src="{{ asset('landing/img/testimonialimg.jpg') }}"
                class="testimonial-img" data-aos="fade-left" alt="Paciente satisfecho">
        </div>

        <div class="col-md-6 testimonial-content">

            <span class="tag">Testimonio</span>

            <h3 class="fw-bold mb-2">Lo que dicen nuestros pacientes</h3>

            <div class="quote-icon" aria-hidden="true">❝</div>

            <p class="testimonial-text">
                «El trato fue excelente desde la recepción hasta el sillón. Me explicaron
                cada paso y salí con la tranquilidad de haber elegido un equipo de confianza.»
            </p>

            <div class="review-person">
                <img src="{{ asset('landing/img/pro.jpg') }}" class="review-avatar" alt="">
                <div>
                    <h6 class="m-0 fw-bold">María González</h6>
                    <small class="text-muted">Paciente</small>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- Blog -->
<section class="container my-5" data-aos="fade-up">

    <div class="text-center mb-4">
        <span class="blog-tag">Nuestro blog</span>
        <h2 class="fw-bold">Artículos y novedades</h2>
        <p class="text-muted">
            Compartimos consejos útiles para cuidar tu salud bucodental en casa.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-6">
            <div class="blog-card d-flex">
                <img src="{{ asset('landing/img/blog1.jpg') }}"
                    class="blog-img" alt="">
                <div class="blog-content">
                    <h5 class="fw-bold">
                        5 motivos por los que los niños necesitan revisiones periódicas
                    </h5>
                    <small class="text-muted">28 de marzo de 2024</small>
                    <p>
                        Las revisiones ayudan a prevenir caries y a consolidar hábitos saludables de por vida.
                    </p>
                    <a href="#" class="read-link">Leer más →</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="blog-card d-flex">
                <img src="{{ asset('landing/img/blog2.jpg') }}"
                    class="blog-img" alt="">
                <div class="blog-content">
                    <h5 class="fw-bold">
                        Todo lo que debes saber sobre un diente necrosado
                    </h5>
                    <small class="text-muted">28 de marzo de 2024</small>
                    <p>
                        Síntomas, causas y opciones de tratamiento cuando el nervio está dañado.
                    </p>
                    <a href="#" class="read-link">Leer más →</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="blog-card d-flex">
                <img src="{{ asset('landing/img/blog3.jpg') }}"
                    class="blog-img" alt="">
                <div class="blog-content">
                    <h5 class="fw-bold">
                        Estética dental: lo esencial sobre carillas y blanqueamiento
                    </h5>
                    <small class="text-muted">28 de marzo de 2024</small>
                    <p>
                        Carillas, blanqueamiento y diseño de sonrisa: cómo funcionan y qué esperar.
                    </p>
                    <a href="#" class="read-link">Leer más →</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="blog-card d-flex">
                <img src="{{ asset('landing/img/blog4.jpg') }}"
                    class="blog-img" alt="">
                <div class="blog-content">
                    <h5 class="fw-bold">
                        Muelas del juicio: cuándo extraer y cómo acortar la recuperación
                    </h5>
                    <small class="text-muted">27 de marzo de 2024</small>
                    <p>
                        Indicaciones de extracción y recomendaciones para un postoperatorio más cómodo.
                    </p>
                    <a href="#" class="read-link">Leer más →</a>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- Estadísticas -->
<section class="stats-section py-5">

    <div class="container stats-box">
        <div class="row text-center">

            <div class="col-md-3">
                <i class="bi bi-people stats-icon" aria-hidden="true"></i>
                <h3 class="counter" data-target="1452">0</h3>
                <p class="stats-label">Pacientes satisfechos</p>
            </div>

            <div class="col-md-3">
                <i class="bi bi-file-earmark-text stats-icon" aria-hidden="true"></i>
                <h3 class="counter" data-target="342">0</h3>
                <p class="stats-label">Citas en línea</p>
            </div>

            <div class="col-md-3">
                <i class="bi bi-award stats-icon" aria-hidden="true"></i>
                <h3 class="counter" data-target="15">0</h3>
                <p class="stats-label">Años de experiencia</p>
            </div>

            <div class="col-md-3">
                <i class="bi bi-person-badge stats-icon" aria-hidden="true"></i>
                <h3 class="counter" data-target="20">0</h3>
                <p class="stats-label">Doctores y personal</p>
            </div>

        </div>
    </div>

</section>

<!-- Preguntas frecuentes -->
<section class="container my-5">

    <div class="text-center mb-4">
        <span class="faq-tag">Preguntas frecuentes</span>
        <h2 class="fw-bold">Dudas habituales</h2>
        <p class="text-muted">
            Respuestas claras sobre cuidados y tratamientos en nuestra clínica.
        </p>
    </div>

    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button"
                    data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="true" aria-controls="q1">
                    ¿Es seguro el blanqueamiento dental?
                </button>
            </h2>
            <div id="q1" class="accordion-collapse collapse show"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Sí: supervisado por un odontólogo, el blanqueamiento es seguro y no daña el esmalte cuando se siguen las indicaciones clínicas.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#q2" aria-expanded="false" aria-controls="q2">
                    ¿Cada cuánto debo ir al dentista?
                </button>
            </h2>
            <div id="q2" class="accordion-collapse collapse"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Recomendamos una revisión cada 6 meses para limpieza y prevención, salvo que tu odontólogo indique otra frecuencia.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#q3" aria-expanded="false" aria-controls="q3">
                    ¿Duele la colocación de implantes?
                </button>
            </h2>
            <div id="q3" class="accordion-collapse collapse"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    El procedimiento se realiza con anestesia local; la molestia posterior suele ser leve y controlable con medicación indicada por el especialista.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#q4" aria-expanded="false" aria-controls="q4">
                    ¿Cuánto dura un tratamiento de ortodoncia?
                </button>
            </h2>
            <div id="q4" class="accordion-collapse collapse"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    De media entre 12 y 24 meses, según la maloclusión y el tipo de aparato o alineadores.
                </div>
            </div>
        </div>

    </div>

</section>

<!-- Llamada a la acción -->
<section class="cta-section container my-5">

    <div class="cta-box">

        <div>
            <h3 class="fw-bold">¿Listo para reservar tu cita?</h3>
            <p class="text-light">
                Agenda tu visita hoy: nuestro equipo te atenderá con gusto.
            </p>
        </div>

        @include('landing_page._cta_whatsapp', [
            'class' => 'btn cta-btn',
            'label' => 'Reservar cita',
        ])

    </div>

</section>

@push('scripts')
<script>
(function () {
    var btn = document.getElementById('appointment-whatsapp-btn');
    if (!btn) return;
    btn.addEventListener('click', function () {
        var phone = btn.getAttribute('data-phone') || @json(config('landing.whatsapp_phone_e164'));
        var name = (document.getElementById('appointment-name') && document.getElementById('appointment-name').value) || '(no indicado)';
        var email = (document.getElementById('appointment-email') && document.getElementById('appointment-email').value) || '(no indicado)';
        var serviceEl = document.getElementById('appointment-service');
        var service = serviceEl && serviceEl.options[serviceEl.selectedIndex] ? serviceEl.options[serviceEl.selectedIndex].text : '(no indicado)';
        var date = (document.getElementById('appointment-date') && document.getElementById('appointment-date').value) || '(no indicada)';
        var lines = [
            'Hola, quiero solicitar una cita en Prime Dental.',
            '',
            'Nombre: ' + name.trim(),
            'Correo: ' + email.trim(),
            'Servicio: ' + service.trim(),
            'Fecha preferida: ' + date.trim()
        ];
        var text = encodeURIComponent(lines.join('\n'));
        window.open('https://wa.me/' + phone + '?text=' + text, '_blank', 'noopener,noreferrer');
    });
})();
</script>
@endpush

@endsection
