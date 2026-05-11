{{-- Home Page - Prime Dental --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Prime Dental - Atención dental profesional y moderna. Tratamientos de alta calidad con tecnología avanzada y un equipo médico comprometido con tu salud dental.">
    <meta name="keywords" content="dentista, salud dental, implantes dentales, ortodoncia, limpieza dental, Gaza">
    <meta name="author" content="Farah Abuassi">
    
    <!-- Bootstrap -->
    <link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Font Awesome (versión única) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('landing/img/download (35).png') }}" type="image/x-icon">
    
    <title>Prime Dental | Atención Dental Profesional</title>
</head>
<body>

    <!-- Header Section -->
    <header>
        <!-- Navbar Principal -->
        <nav class="navbar main-nav fixed-top py-3 navbar-expand-lg">
            <div class="container d-flex justify-content-between align-items-center">
                
                <!-- Logo -->
                <div class="d-flex align-items-center gap-2 brand-logo">
                    <i class="fa-solid fa-tooth" aria-hidden="true"></i>
                    <h4 class="fw-bold m-0 Logo">Prime Dental</h4>
                </div>
                
                <!-- Menú Desktop -->
                <ul class="nav d-none d-lg-flex">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                           href="{{ route('home') }}">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('whyus') ? 'active' : '' }}" 
                           href="{{ route('whyus') }}">
                            Por Qué Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" 
                           href="{{ route('services') }}">
                            Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}" 
                           href="{{ route('team') }}">
                            Equipo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" 
                           href="{{ route('pricing') }}">
                            Precios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('solutions') ? 'active' : '' }}" 
                           href="{{ route('solutions') }}">
                            Soluciones
                        </a>
                    </li>
                </ul>
                
                <!-- Botón CTA Desktop -->
                <a href="#" class="btn btn-primary px-4 d-none d-lg-block">
                    Reservar Cita
                </a>
                
                <!-- Botón Menú Móvil -->
                <button class="navbar-toggler d-lg-none border-0" 
                        type="button"
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#mobileMenu"
                        aria-label="Abrir menú">
                    <i class="bi bi-list fs-1"></i>
                </button>
                
            </div>
        </nav>
        
        <!-- Offcanvas Menú Móvil -->
        <div class="offcanvas offcanvas-end" id="mobileMenu" tabindex="-1">
            <div class="offcanvas-header border-bottom">
                <div class="d-flex align-items-center gap-2 brand-logo">
                    <i class="fa-solid fa-tooth"></i>
                    <h4 class="fw-bold m-0">Prime Dental</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            
            <div class="offcanvas-body">
                <ul class="navbar-nav gap-2">
                    <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a></li>
                    <li><a class="nav-link {{ request()->routeIs('whyus') ? 'active' : '' }}" href="{{ route('whyus') }}">Por Qué Nosotros</a></li>
                    <li><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Servicios</a></li>
                    <li><a class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">Equipo</a></li>
                    <li><a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Precios</a></li>
                    <li><a class="nav-link {{ request()->routeIs('solutions') ? 'active' : '' }}" href="{{ route('solutions') }}">Soluciones</a></li>
                </ul>
                <a href="#" class="btn btn-primary w-100 mt-4">Reservar Cita</a>
            </div>
        </div>
    </header>
    
    <!-- Contenido Principal -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer Section -->
    <footer class="footer-section py-5 mt-5" role="contentinfo">
        <div class="container">
            
            <div class="row g-4">
                
                <!-- Newsletter -->
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Suscríbete a nuestro Newsletter</h6>
                    <p class="text-muted small">
                        Recibe las últimas novedades y consejos de salud dental directamente en tu correo.
                    </p>
                    
                    <form class="newsletter-box d-flex gap-2" action="#" method="POST">
                        @csrf
                        <div class="flex-grow-1">
                            <input type="email" name="email" class="form-control" 
                                   placeholder="tu@email.com" required
                                   aria-label="Correo electrónico">
                        </div>
                        <button type="submit" class="btn btn-primary px-4">Suscribir</button>
                    </form>
                </div>
                
                <!-- Menú Principal -->
                <div class="col-lg-2">
                    <h6 class="fw-bold mb-3">Menú</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-decoration-none">Inicio</a></li>
                        <li><a href="{{ route('whyus') }}" class="text-decoration-none">Por Qué Nosotros</a></li>
                        <li><a href="{{ route('services') }}" class="text-decoration-none">Servicios</a></li>
                        <li><a href="{{ route('team') }}" class="text-decoration-none">Equipo</a></li>
                        <li><a href="{{ route('pricing') }}" class="text-decoration-none">Precios</a></li>
                        <li><a href="{{ route('solutions') }}" class="text-decoration-none">Soluciones Dentales</a></li>
                    </ul>
                </div>
                
                <!-- Páginas Utilitarias -->
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Enlaces Útiles</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Guía de Estilo</a></li>
                        <li><a href="#">Contraseña Protegida</a></li>
                        <li><a href="#">Página 404</a></li>
                        <li><a href="#">Comenzar Aquí</a></li>
                        <li><a href="#">Licencias</a></li>
                        <li><a href="#">Registro de Cambios</a></li>
                    </ul>
                </div>
                
                <!-- Contacto -->
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Contacto</h6>
                    <ul class="footer-contact list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:contact@dentist.com" class="text-decoration-none">contact@dentist.com</a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2"></i>
                            <a href="tel:+970598536488" class="text-decoration-none">+970 598 536 488</a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-geo-alt me-2"></i>
                            Al-Remal — Khaled Bin Al-Waleed<br>
                            Gaza, Palestina
                        </li>
                    </ul>
                </div>
                
            </div>
            
            <hr class="my-4">
            
            <!-- Barra Inferior -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                
                <div class="d-flex align-items-center gap-2 logo">
                    <i class="fa-solid fa-tooth"></i>
                    <strong>Prime Dental</strong>
                </div>
                
                <div class="text-center text-md-start">
                    <small class="text-muted d-block">
                        Copyright &copy; Prime Dental — Diseñado por BRIX Templates — Desarrollado con Webflow
                    </small>
                    <small class="text-muted">
                        Desarrollado por <a href="https://github.com/farahabuassi17" target="_blank" rel="noopener noreferrer">Farah Abuassi</a> • 
                        Distribuido por <a href="https://themewagon.com" target="_blank" rel="noopener noreferrer">ThemeWagon</a>
                    </small>
                </div>
                
                <div class="social-icons d-flex gap-3">
                    <a href="#" aria-label="Facebook" class="text-decoration-none"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Twitter" class="text-decoration-none"><i class="bi bi-twitter"></i></a>
                    <a href="#" aria-label="Instagram" class="text-decoration-none"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="YouTube" class="text-decoration-none"><i class="bi bi-youtube"></i></a>
                    <a href="#" aria-label="LinkedIn" class="text-decoration-none"><i class="bi bi-linkedin"></i></a>
                </div>
                
            </div>
            
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    
    <script>
        // Inicializar AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
    
</body>
</html>