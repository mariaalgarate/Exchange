<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../imgs/favicon.png" type="image/x-icon">

    <title>{{ config('Exchange', 'Exchange') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <script src="https://unpkg.com/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>


    <script src="https://kit.fontawesome.com/61f09bd589.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Marca y botón de hamburguesa -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../imgs/logo_exchange.png" alt="Logo" width="45%" height="45%">
                </a>

                <!-- Botón de hamburguesa -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#firstNavbarContent" aria-controls="firstNavbarContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido del menú que se despliega/colapsa -->
                <div class="collapse navbar-collapse" id="firstNavbarContent">
                    <!-- Lado izquierdo del Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-auto">
                            <form class="d-flex justify-content-center" method="GET"
                                action="{{ route('product.search') }}">
                                <input class="form-control me-2" name="query" type="search" placeholder="Buscar"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </form>
                        </li>
                    </ul>

                    <!-- Lado derecho del Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Mi cuenta') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin/panel') }}">Panel de Administrador</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->nombre_usuario }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('show-profile') }}">{{ __('Ver Perfil') }}</a>
                                    <a class="dropdown-item" href="{{ route('my-products') }}">{{ __('Mis productos') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Segundo Navbar (Categorías, Ofertas) -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-top: 1px solid #dee2e685;">
    <div class="container-fluid py-1">
        <div class="mx-auto d-flex align-items-center">
            <button class="navbar-toggler py-2" id="navbarTogglerBtn" type="button" data-bs-toggle="collapse"
                data-bs-target="#secondNavbarContent" aria-controls="secondNavbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-brand">
                    Novedades
                    <img src="../imgs/flecha_abajo.svg" width="16" height="16" alt="Flecha" width="7%" id="toggleArrow">
                </span>
            </button>
        </div>

        <!-- Contenido del menú que se despliega/colapsa -->
        <div class="collapse navbar-collapse" id="secondNavbarContent">
            <ul class="navbar-nav ms-auto">
                @auth
                    @if (Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories/index') }}">Categorías</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('popular') }}">{{ __('Lo más vendido') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('offers') }}">{{ __('Ofertas') }}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            <i class="fas fa-shopping-cart" style="color:#E37A3F;"></i>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


        <main class="pb-4">
            @yield('content')
        </main>
    </div>
    <footer class="py-2">
        <div class="container-fluid border-bottom border-light bg-light text-dark">
            <h2 class="my-4">Contacta con nosotros</h2>
            <form>
                <div class="row d-flex align-items-center justify-content-center mb-3">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nombre"
                                placeholder="Nombre y apellidos" required="">
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" id="telefono" placeholder="Teléfono"
                                required="">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                required="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <textarea class="form-control" id="mensaje" rows="5" style="height: 146px" placeholder="Mensaje"
                                required=""></textarea>
                        </div>
                    </div>
                    <div class="col-md-4 text-start d-flex flex-column justify-content-around">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="condiciones" required="">
                            <label class="form-check-label badge text-wrap text-start lh-base text-secondary"
                                for="condiciones">He
                                leído y acepto las <a href="{{ route('privacy-policy') }}"> políticas de
                                    privacidad*</a></label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privacidad" required="">
                            <label class="form-check-label badge text-wrap text-start lh-base text-secondary"
                                for="privacidad">Consiento que mis datos sean utilizados por Exchange con
                                fines informativos y de marketing, sabiendo que estos no serán
                                cedidos.*</label>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-around">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container mt-5 py-2">
            <div class="row" style="justify-content: space-between;">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Adicional</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('buying') }}"
                                class="nav-link p-0 text-body-secondary">¿Cómo comprar?</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('selling') }}"
                                class="nav-link p-0 text-body-secondary">¿Cómo vender?</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('exchanging') }}"
                                class="nav-link p-0 text-body-secondary">¿Cómo intercambiar?</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('seller-protections') }}"
                                class="nav-link p-0 text-body-secondary">Protección del vendedor</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Acerca de</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('privacy-policy') }}"
                                class="nav-link p-0 text-body-secondary">Política de privacidad</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('legal-notice') }}"
                                class="nav-link p-0 text-body-secondary">Aviso legal</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('cookies-policy') }}"
                                class="nav-link p-0 text-body-secondary">Política de cookies</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('conditions-of-sale') }}"
                                class="nav-link p-0 text-body-secondary">Condiciones de uso y ventas</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Contacto</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="mailto:maria13012004@gmail.com"
                                class="nav-link p-0 text-body-secondary">info@exchange.com</a></li>
                        <li class="nav-item mb-2"><a href="tel:640888363"
                                class="nav-link p-0 text-body-secondary">Tlfn. 640 88 83 63</a></li>
                    </ul>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-center text-center py-4 my-4 border-top">
                <p>© 2024 Exchange. Todos los derechos reservados.</p>
            </div>
        </div>
        </div>
    </footer>
    <script src="{{ asset('js/cookies.js') }}"></script>

</body>

</html>





<!--Modal Cookies-->
<div class="modal fade" id="Modalcookies" tabindex="-1" aria-labelledby="Modalcookies-label" aria-hidden="true"
    data-bs-backdrop="static" style="z-index: 100000;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Configuración de cookies</h5>
            </div>
            <div class="modal-body">
                <p>Las cookies técnicas son las únicas que se encuentran activadas por defecto.
                    A través de este panel puedes configurar tus preferencias y pulsar “GUARDAR” para que éstas sean
                    conservadas en próximas sesiones. También puedes aceptar el uso de todas las cookies pulsando
                    “ACEPTAR TODAS”.
                    Si quieres más información consulta la POLÍTICA DE COOKIES de nuestra página web <a
                        href="/cookies-policy" data-bs-toggle="modal" data-bs-target="#Modalpolitica">Política de
                        cookies</a>.</p>
                <p>
                </p>
                <div class="accordion bg-light" id="accordionCookies">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Cookies técnicas
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Son aquellas que permiten al usuario la navegación a través
                                    de la página web, plataforma o aplicación y la utilización de
                                    las diferentes opciones o servicios que en ella existen,
                                    incluyendo aquellas que se utilizan para permitir la gestión y
                                    operativa de la página web y habilitar sus funciones y servicios,
                                    como, por ejemplo, controlar el tráfico y la comunicación de datos,
                                    identificar la sesión, acceder a partes de acceso restringido, etc.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Cookies de preferencias o personalización
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Son aquellas que permiten recordar información para que el usuario
                                    acceda al servicio con determinadas características que pueden diferenciar
                                    su experiencia de la de otros usuarios.</p>
                                <div class="list_cookies">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="check1"><strong>Desactivar /
                                                Activar</strong></label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="check1" checked="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Cookies de análisis o medición
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Son aquellas que, tratadas por nosotros o por terceros,
                                    nos permiten cuantificar el número de usuarios y así realizar la medición y
                                    análisis estadístico de la utilización que hacen los usuarios del servicio
                                    ofertado.</p>
                                <div class="list_cookies">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="check2"><strong>Desactivar /
                                                Activar</strong></label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="check2" checked="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Cookies de publicidad comportamental
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Son aquellas que, tratadas por nosotros o por terceros,
                                    nos permiten analizar sus hábitos de navegación en Internet
                                    para que podamos mostrarle publicidad relacionada con su
                                    perfil de navegación.</p>
                                <div class="list_cookies">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="check3"><strong>Desactivar /
                                                Activar</strong></label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="check3" checked="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="saveCookies()"
                    aria-label="Close">Guardar</button>
                <button type="button" class="btn btn-primary" onclick="acceptCookies()" data-bs-dismiss="modal"
                    aria-label="Close">Aceptar todas</button>
                <button type="button" class="btn btn-primary" onclick="rejectCookies()" data-bs-dismiss="modal"
                    aria-label="Close">Rechazar todas</button>
            </div>
        </div>
    </div>
</div>

<!--Script para Cookies-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Verifica si la cookie ya está establecida
        const cookieValue = document.cookie.split('; ').find(row => row.startsWith('cookies_accepted='));
        const cookiePopup = document.getElementById("cookie-popup");

        if (!cookieValue) {
            // Muestra el popup de cookies si no está aceptada ni rechazada
            cookiePopup.style.display = "block";
        } else {
            // Oculta el popup de cookies si la cookie existe
            cookiePopup.style.display = "none";
        }

        // Cuando el usuario acepta las cookies
        document.getElementById("accept-cookies-btn").addEventListener("click", function () {
            document.cookie = "cookies_accepted=true; path=/; max-age=" + 60 * 60 * 24 * 365;
            cookiePopup.style.display = "none";
        });

        // Cuando el usuario rechaza las cookies
        document.getElementById("reject-cookies-btn").addEventListener("click", function () {
            document.cookie = "cookies_accepted=false; path=/; max-age=" + 60 * 60 * 24 * 365;
            cookiePopup.style.display = "none";
        });
    });
</script>

<!--Script para Menú Desplegable-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownToggle = document.querySelector('.navbar .dropdown-toggle');
        var dropdownMenu = document.querySelector('.navbar .dropdown-menu');
        var timer; // Variable para almacenar el temporizador

        dropdownToggle.addEventListener('mouseover', function() {
            clearTimeout(timer); // Limpiar el temporizador anterior, si existe
            dropdownMenu.classList.add('show');
        });

        dropdownToggle.addEventListener('mouseout', function() {
            // Establecer un temporizador para ocultar el menú después de 1 segundo
            timer = setTimeout(function() {
                dropdownMenu.classList.remove('show');
            }, 1000); // 1000 milisegundos = 1 segundo
        });

        // Agregar evento para cancelar el temporizador si el cursor vuelve al área del menú
        dropdownMenu.addEventListener('mouseover', function() {
            clearTimeout(timer);
        });

        // Agregar evento para cerrar el menú si el cursor sale del área del menú
        dropdownMenu.addEventListener('mouseout', function(event) {
            if (!event.relatedTarget || !dropdownMenu.contains(event.relatedTarget)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>
<!-- jQuery (necesario para usar el script de abajo) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $("#navbarTogglerBtn").click(function () {
            $("#toggleArrow").toggleClass("rotate-animation");
        });
    });
</script>

<style>
    .rotate-animation {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }
</style>



<!-- Popup de cookies Inicio -->
<div id="cookie-popup" class="cookie-popup">
    <p class="mb-3">Este sitio web utiliza cookies para mejorar la experiencia del usuario. Al utilizar nuestro sitio
        web, usted acepta nuestro uso de cookies de acuerdo con nuestra <a href="/cookies-policy">política de
            cookies</a>.</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#Modalcookies">Configuración de cookies</button>
    <button id="accept-cookies-btn" class="btn btn-primary">Aceptar</button>
    <button id="reject-cookies-btn" class="btn btn-secondary">Rechazar</button>
</div>