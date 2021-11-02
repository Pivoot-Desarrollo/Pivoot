<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Mobile Application HTML5 Template">

    <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

    <title>PIVOOT-Gestor de escuela deportiva</title>

    <link rel="shortcut icon" href="../assets/LOGO-VF-PIVOOT.png" type="image/x-icon">


    <link rel="stylesheet" href="{{ asset('css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/mobster.css') }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="../assets/favicon.png" alt="" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-lg-5 mt-3 mt-lg-0">
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="#sobrePivoot" id="navbarDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Inicio</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobrePivoot">PIVOOT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#funciones">FUNCIONALIDADES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#modulos">MÓDULOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ventajas">VENTAJAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactos">CONTACTO</a>
                    </li>
                </ul>
                <div class="ml-auto my-2 my-lg-0">
                    <a class="btn btn-dark rounded-pill" href="{{ 'login' }}">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="page-hero-section bg-image hero-home-1" style="background-image: url(../img/bg_hero_1.svg);">
        <div class="hero-caption pt-5">
            <div class="container h-100">
                <div id="sobrePivoot" class="row align-items-center h-100">
                    <div class="col-lg-6 wow fadeInUp">
                        <h2 class="mb-4">Administra tu escuela deportiva con PIVOOT</h2>
                        <p class="mb-4">Pivoot te brinda un servicio para gestionar y administrar<br>
                            tus categorias, tener un mejor control de los usuarios y jugadores que hacen
                            parte del Sistema, además de tener un control de asistencia y rendimiento de cada jugador
                            dentro de la escuela.</p>

                    </div>
                    <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                        <div class="img-place mobile-preview floating-animate">
                            <img src="../img/foto-pivoot.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="page-section no-scroll">
        <h2 id="modulos" class="text-center wow fadeIn">Módulos principales</h2>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-lg-3 py-3 wow fadeInLeft">
                            <div class="card card-body border-0 text-center shadow pt-5 width">
                                <div class="svg-icon mx-auto mb-5">
                                    <img src="{{ asset('img/icons/categoria.png') }}" alt="">
                                </div>
                                <h5 class="fg-gray">Categorías</h5>
                                <p class="fs-small">Su función es asignar por edades a cada jugador
                                    que se encuentre el sistema en Pivoot a una categoría.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 py-3 wow fadeInUp">
                            <div class="card card-body border-0 text-center shadow pt-5">
                                <div class="svg-icon mx-auto mb-4">
                                    <img src="{{ asset('img/icons/usuario-jugadores.png') }}" alt="">
                                </div>
                                <h5 class="fg-gray">Usuarios</h5>
                                <p class="fs-small">Un jugador registrado en el sistema
                                    tendra acceso al sistema autenticandose con
                                    correo y clave el cual se le suministra apenas
                                    su registro haya sido exitoso.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 py-3 wow fadeInUp">
                            <div class="card card-body border-0 text-center shadow pt-5">
                                <div class="svg-icon mx-auto mb-4">
                                    <img src="{{ asset('img/icons/acudientes.png') }}" alt="">
                                </div>
                                <h5 class="fg-gray">Acudiente y novedades</h5>
                                <p class="fs-small">El acuidente de cada jugador tendra
                                    acceso al sistema con el fin de echar
                                    un vistazo al rendimiento que lleva el jugador.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 py-3 wow fadeInRight">
                            <div class="card card-body border-0 text-center shadow pt-5">
                                <div class="svg-icon mx-auto mb-4">
                                    <img src="{{ asset('img/icons/director.png') }}" alt="">
                                </div>
                                <h5 class="fg-gray">Director General</h5>
                                <p class="fs-small">
                                    El director general tendra acceso a
                                    todas las funcionalidades que manaje
                                    el sistema, incluyendo los modulos que este maneja.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="position-realive bg-image" style="background-image: url(../img/pattern_1.svg);">

        <div class="page-section">
            <div class="container">
                <h2 id="funciones" class="text-center wow fadeIn">Funcionalidades</h2>
                <div class="row">
                    <div class="col-lg-5 py-3">
                        <br>

                        <div class="mobile-preview floating-animate">
                            <img src="../img/Funcion.png" width="580px">
                        </div>

                    </div>
                    <div class="col-lg-6 py-3 mt-lg-8">
                        <div class="iconic-list">
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span class="mai-cube"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Gestión de categorías</h5>
                                    <p class="fs-small">Pivoot te permite controlar la organización de los
                                        jugadores por categorías,
                                        facilitando y agilizando todos los procesos que realizas en la gestión de tu
                                        escuela.</p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-info fg-white rounded-circle">
                                    <span class="mai-shield"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Control de asistencia</h5>
                                    <p class="fs-small">Pivoot te brinda la opción de llevar un seguimiento de los
                                        jugadores que hacen
                                        parte de la Escuela y así llevar un mejor control de los jugadores que asisten
                                        frecuentarme y de los que no. </p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-indigo fg-white rounded-circle">
                                    <span class="mai-desktop-outline"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Registro de actividad</h5>
                                    <p class="fs-small">Pivoot permite registrar el seguimiento de cada jugador
                                        para evaluar su
                                        rendimiento dentro de la Escuela, así mismo te permite imprimir este reporte.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 id="ventajas" class="text-center wow fadeIn">Ventajas de PIVOOT</h2><br>

        <div class="page-section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 py-3">
                        <div class="iconic-list">
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-content">
                                    <h5>Conservación del tiempo.</h5><br>
                                    <p class="fs-small"> Con un software para gestión deportiva ahorrarás en
                                        gastos y sobre todo en tiempo.
                                        Con PIVOOT tendrás un sistema que puede detectar el
                                        punto de congestión que genera retrasos y costos.</p>
                                </div>
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span class="mai-analytics"></span>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-content">
                                    <h5>Seguridad de datos.</h5><br>
                                    <p class="fs-small">PIVOOT tiene como objetivo principal proteger los datos de
                                        la Escuela.El sistema le brindara al
                                        usuario tres aspectos fundamentales:</p>

                                    <ul>
                                        <li class="fs-small"> Confidencialidad.</li>
                                        <li class="fs-small">Disponibilidad.</li>
                                        <li class="fs-small">Integridad.</li>
                                    </ul>
                                </div>
                                <div class="iconic-md iconic-text bg-info fg-white rounded-circle">
                                    <span class="mai-shield-checkmark"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 py-3 wow zoomIn">
                        <div class="img-place mobile-preview ">
                            <img src="../img/ventajas_jugador_adobespark.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 py-3">
                        <div class="iconic-list">
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span class="mai-speedometer-outline"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Gestión de datos en tiempo real.</h5><br>
                                    <p class="fs-small">Hace una gestión de los datos y procesos en tiempo real,
                                        al usar los procesos a tiempo real se puede
                                        resolver cualquier
                                        inconveniente a tiempo</p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-success fg-white rounded-circle">
                                    <span class="mai-aperture"></span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Optimización del trabajo.</h5><br>
                                    <p class="fs-small">Optimiza el trabajo haciendo una gestión integrada y
                                        automatizada como lo son:</p>

                                    <ul>

                                        <li class="fs-small"> Evita el desconocimiento de entrenamiento y test
                                            realizados.</li><br>
                                        <li class="fs-small">Permite saber qué tipo de entrenamiento se
                                            realizará.</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 py-3 mb-5 mb-lg-0">
                    <div class="img-place w-lg-75 wow zoomIn">
                        <img src="../img/illustration_contact.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-5 py-3">
                    <center>
                        <h3 id="contactos" class="wow fadeInUp">¿Quieres saber más de nosotros?<br><br>
                            Contáctanos
                    </center>
                    </h4>

                    <form method="POST" class="mt-5">
                        <div class="form-group wow fadeInUp">
                            <label for="name" class="fw-medium fg-grey">Nombre completo:</label>
                            <input type="text" class="form-control" id="name">
                        </div>

                        <div class="form-group wow fadeInUp">
                            <label for="email" class="fw-medium fg-grey">Correo electrónico:</label>
                            <input type="text" class="form-control" id="email">
                        </div>

                        <div class="form-group wow fadeInUp">
                            <label for="message" class="fw-medium fg-grey">Mensaje:</label>
                            <textarea rows="6" class="form-control" id="message"></textarea>
                        </div>

                        <div class="form-group mt-4 wow fadeInUp">
                            <button type="submit" class="btn btn-dark">Enviar mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 py-2">

                <!-- Please don't remove or modify the credits below -->
                <img src="../assets/favicon.png" width="120px">
            </div>
            <div class="col-12 col-md-6 py-2">
                <ul class="nav justify-content-end">
                    <p class="d-inline-block ml-2">&COPY;Equipo desarrollador ESBALCA</a>.</p>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('js/mobster.js') }}"></script>

</body>

</html>
