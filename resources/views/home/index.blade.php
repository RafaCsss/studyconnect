<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyConnect - Red Social Académica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4285F4;
            --secondary-color: #34A853;
            --accent-color: #FBBC05;
            --danger-color: #EA4335;
            --light-bg: #F8F9FA;
            --dark-text: #212529;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-text);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: var(--primary-color);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5c6bc0 100%);
            color: white;
            padding: 5rem 0;
            margin-bottom: 2rem;
        }
        
        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .feature-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }
        
        .stats-box {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: #3367d6;
            border-color: #3367d6;
        }
        
        .testimonial {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1rem;
        }
        
        .testimonial-author {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .cta-section {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2E7D32 100%);
            color: white;
            padding: 4rem 0;
            margin: 3rem 0;
        }
        
        footer {
            background-color: #343a40;
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-links h5 {
            color: var(--accent-color);
            margin-bottom: 1.2rem;
        }
        
        .footer-links ul {
            list-style: none;
            padding-left: 0;
        }
        
        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
            line-height: 2;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-icons {
            font-size: 1.5rem;
            margin-right: 1rem;
        }
        
        .mockup-interface {
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        
        .badge-feature {
            background-color: var(--accent-color);
            color: var(--dark-text);
            font-weight: 500;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">StudyConnect</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Características</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="#">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-text">
                    <h1>Conecta. Aprende. Crece.</h1>
                    <p class="lead mb-4">StudyConnect revoluciona el aprendizaje colaborativo conectando estudiantes con intereses académicos similares. ¡Únete a la comunidad educativa más innovadora!</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-light btn-lg">Conocer más</a>
                        <a href="#" class="btn btn-outline-light btn-lg">Iniciar sesión</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://via.placeholder.com/600x400" alt="StudyConnect Platform" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold">¿Por qué usar StudyConnect?</h2>
            <p class="lead text-muted">Una plataforma diseñada específicamente para las necesidades de los estudiantes modernos</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-user-graduate feature-icon"></i>
                        <h3 class="h5 mb-3">Perfiles Académicos Detallados</h3>
                        <p class="mb-0">Crea un perfil con tus intereses, cursos, habilidades y objetivos académicos para conectar con personas afines.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-book-open feature-icon"></i>
                        <h3 class="h5 mb-3">Biblioteca de Recursos</h3>
                        <p class="mb-0">Accede a una extensa colección de apuntes, guías y materiales educativos compartidos por la comunidad.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-users feature-icon"></i>
                        <h3 class="h5 mb-3">Grupos de Estudio Virtuales</h3>
                        <p class="mb-0">Únete o crea grupos temáticos con herramientas de colaboración en tiempo real.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-medal feature-icon"></i>
                        <h3 class="h5 mb-3">Sistema de Gamificación</h3>
                        <p class="mb-0">Gana badges, puntos y reconocimientos por tus contribuciones a la comunidad académica.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Una experiencia de aprendizaje social única</h2>
                <p class="mb-4">StudyConnect combina lo mejor de las redes sociales con herramientas educativas especializadas, creando un ecosistema perfecto para el desarrollo académico.</p>
                
                <div class="d-flex mb-3 align-items-center">
                    <div class="bg-primary text-white rounded-circle p-2 me-3">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="mb-0">Feed personalizado con contenido relevante a tus áreas de estudio</p>
                </div>
                
                <div class="d-flex mb-3 align-items-center">
                    <div class="bg-primary text-white rounded-circle p-2 me-3">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="mb-0">Calendario compartido para organizar sesiones de estudio</p>
                </div>
                
                <div class="d-flex mb-3 align-items-center">
                    <div class="bg-primary text-white rounded-circle p-2 me-3">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="mb-0">Sistema de mensajería directa entre estudiantes</p>
                </div>
                
                <div class="d-flex mb-4 align-items-center">
                    <div class="bg-primary text-white rounded-circle p-2 me-3">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="mb-0">Herramientas colaborativas como pizarras virtuales y notas compartidas</p>
                </div>
                
                <a href="#" class="btn btn-primary btn-lg">Explorar características</a>
            </div>
            <div class="col-lg-6">
                <img src="https://imgs.search.brave.com/24HRE9jnvIZML9BulTyMpDs44mf4e9552_sMz64yrHw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/Zm90by1ncmF0aXMv/YWRvbGVzY2VudGVz/LWVzdHVkaWFuZG8t/dHJhYmFqYW5kby1q/dW50b3NfMjMtMjE0/NzY1OTE1Mi5qcGc_/c2VtdD1haXNfaHli/cmlkJnc9NzQw" alt="StudyConnect Interface Preview" class="img-fluid mockup-interface">
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="stats-box">
                    <div class="stats-number">10,000+</div>
                    <p class="lead mb-0">Estudiantes activos</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <div class="stats-number">5,000+</div>
                    <p class="lead mb-0">Recursos compartidos</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <div class="stats-number">1,200+</div>
                    <p class="lead mb-0">Grupos de estudio</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="text-center fw-bold mb-5">Lo que dicen nuestros usuarios</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-text">
                        "StudyConnect transformó mi experiencia universitaria. Encontré un grupo de estudio perfecto para mis clases de ingeniería y mis calificaciones mejoraron notablemente."
                    </div>
                    <div class="testimonial-author">- Ana García, Ing. Civil</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-text">
                        "Como estudiante a distancia, esta plataforma me ha permitido conectarme con otros compañeros y sentirme parte de una comunidad académica real."
                    </div>
                    <div class="testimonial-author">- Carlos Mendoza, Psicología</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-text">
                        "Los recursos compartidos por otros estudiantes de medicina han sido invaluables para mi preparación. ¡La colaboración hace la diferencia!"
                    </div>
                    <div class="testimonial-author">- Laura Torres, Medicina</div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container text-center">
            <h2 class="display-5 fw-bold mb-3">¿Listo para revolucionar tu forma de estudiar?</h2>
            <p class="lead mb-4">Únete a miles de estudiantes que ya están aprovechando el poder del aprendizaje colaborativo.</p>
            <a href="#" class="btn btn-light btn-lg">Regístrate gratis</a>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 text-white mb-3">StudyConnect</h3>
                    <p class="text-muted">Una plataforma diseñada por estudiantes para estudiantes, con el objetivo de hacer el aprendizaje más efectivo y colaborativo.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white social-icons"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white social-icons"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white social-icons"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white social-icons"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                    <h5>Plataforma</h5>
                    <ul>
                        <li><a href="#">Características</a></li>
                        <li><a href="#">Testimonios</a></li>
                        <li><a href="#">Precios</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                    <h5>Recursos</h5>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Tutoriales</a></li>
                        <li><a href="#">Guías</a></li>
                        <li><a href="#">Webinars</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                    <h5>Empresa</h5>
                    <ul>
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Carreras</a></li>
                        <li><a href="#">Prensa</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 footer-links">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Términos</a></li>
                        <li><a href="#">Privacidad</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <p class="text-muted mb-0">© 2023 StudyConnect. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>