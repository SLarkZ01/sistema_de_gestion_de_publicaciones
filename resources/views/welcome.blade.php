<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Gestión de Publicaciones</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome para iconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fa;
            }
            .hero-section {
                background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
                color: white;
                padding: 5rem 0;
                margin-bottom: 2rem;
            }
            .feature-box {
                background-color: white;
                border-radius: 10px;
                padding: 1.5rem;
                box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
                margin-bottom: 1.5rem;
                transition: transform 0.3s ease;
                height: 100%;
            }
            .feature-box:hover {
                transform: translateY(-5px);
            }
            .feature-icon {
                font-size: 2.5rem;
                margin-bottom: 1rem;
                color: #4e73df;
            }
            .nav-btn {
                margin: 0 0.5rem;
            }
            .footer {
                background-color: #4e73df;
                color: white;
                padding: 1.5rem 0;
                margin-top: 2rem;
            }
            .get-started-btn {
                background-color: #36b9cc;
                border-color: #36b9cc;
                font-weight: 600;
                padding: 0.75rem 1.5rem;
            }
            .get-started-btn:hover {
                background-color: #2c9faf;
                border-color: #2c9faf;
            }
            .step-box {
                padding: 2rem;
                border-left: 5px solid #4e73df;
                margin-bottom: 1.5rem;
                background-color: white;
                box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            }
            .step-number {
                font-size: 1.5rem;
                font-weight: bold;
                color: #4e73df;
                margin-right: 0.5rem;
            }
        </style>
    </head>
    <body>
        <header>
            <!-- Navegación -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fas fa-book-open me-2"></i>Sistema de Gestión de Publicaciones
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="btn btn-outline-light nav-btn">Iniciar Sesión</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="btn btn-light nav-btn">Registrarse</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="container text-center">
                    <h1 class="display-4 fw-bold mb-4">Bienvenido al Sistema de Gestión de Publicaciones</h1>
                    <p class="lead mb-5">Una plataforma completa para crear, administrar y organizar tus publicaciones de manera eficiente</p>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-lg get-started-btn">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-lg get-started-btn">Comenzar Ahora</a>
                        @endif
                    @endif
                </div>
            </section>
        </header>
        
        <main>
            <!-- Características -->
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-5">Características Principales</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box">
                                <div class="text-center">
                                    <i class="fas fa-edit feature-icon"></i>
                                    <h3>Gestión de Publicaciones</h3>
                                    <p>Crea, edita y organiza tus publicaciones con facilidad. Añade contenido multimedia y personaliza su presentación.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box">
                                <div class="text-center">
                                    <i class="fas fa-users feature-icon"></i>
                                    <h3>Roles y Permisos</h3>
                                    <p>Administra el acceso de usuarios con diferentes niveles de permisos para gestionar el contenido.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box">
                                <div class="text-center">
                                    <i class="fas fa-chart-line feature-icon"></i>
                                    <h3>Estadísticas y Reportes</h3>
                                    <p>Visualiza estadísticas detalladas sobre tus publicaciones y genera informes personalizados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Cómo funciona -->
            <section class="py-5 bg-light">
                <div class="container">
                    <h2 class="text-center mb-5">¿Cómo Usar el Sistema?</h2>
                    
                    <div class="step-box">
                        <h3><span class="step-number">1.</span> Crear una Cuenta</h3>
                        <p>Regístrate para acceder a todas las funcionalidades del sistema. Solo necesitas proporcionar tu correo electrónico y crear una contraseña.</p>
                    </div>
                    
                    <div class="step-box">
                        <h3><span class="step-number">2.</span> Acceder al Dashboard</h3>
                        <p>Una vez registrado, accede al panel de control donde encontrarás todas las herramientas necesarias para gestionar tus publicaciones.</p>
                    </div>
                    
                    <div class="step-box">
                        <h3><span class="step-number">3.</span> Crear Publicaciones</h3>
                        <p>Utiliza el editor integrado para crear nuevas publicaciones. Puedes añadir texto, imágenes, documentos y otros elementos multimedia.</p>
                    </div>
                    
                    <div class="step-box">
                        <h3><span class="step-number">4.</span> Administrar Categorías</h3>
                        <p>Organiza tus publicaciones en categorías para facilitar su búsqueda y visualización. Crea nuevas categorías según tus necesidades.</p>
                    </div>
                    
                    <div class="step-box">
                        <h3><span class="step-number">5.</span> Visualizar Estadísticas</h3>
                        <p>Accede a informes detallados sobre el rendimiento de tus publicaciones, interacciones y otros datos relevantes.</p>
                    </div>
                </div>
            </section>
            
            <!-- Llamada a la acción -->
            <section class="py-5">
                <div class="container text-center">
                    <h2 class="mb-4">¿Listo para comenzar?</h2>
                    <p class="lead mb-5">Únete a nuestra plataforma y empieza a gestionar tus publicaciones de manera eficiente</p>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-primary">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-lg btn-primary me-3">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-lg btn-outline-primary">Registrarse</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </section>
        </main>
        
        <footer class="footer">
            <div class="container text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Sistema de Gestión de Publicaciones. Todos los derechos reservados.</p>
            </div>
        </footer>
        
        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
