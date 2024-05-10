@extends('layouts.app')
@section('content')
    <main class="pb-4">

        <!-- Banner Carrusel -->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="../imgs/bannerPrincipal1.jpg" class="d-block w-100" alt="Banner 1" style="object-position: top;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Descubre un nuevo mundo de intercambios</h2>
                        <p>¡Únete a nuestra comunidad y encuentra productos únicos para intercambiar!</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../imgs/bannerPrincipal2.jpg" class="d-block w-100" alt="Banner 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Explora ofertas exclusivas</h2>
                        <p>Encuentra productos de alta calidad a precios increíbles en nuestro marketplace.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../imgs/bannerPrincipal3.jpg" class="d-block w-100" alt="Banner 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Descubre la comodidad de comprar en línea</h2>
                        <p>Écha un vistazo a nuestro amplio catálogo y disfruta de una experiencia de compra conveniente
                            desde la comodidad de tu hogar.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <!--Fila de Divs-->
        <div class="container py-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('exchange') }}" class="square-link">
                        <div class="square" style="background-image: url('../imgs/img-intercambio-inicio.jpg');">
                            <div class="text-overlay">
                                <h2>Empieza a realizar intercambios</h2>
                                <p>¡Descubre una nueva forma de intercambiar productos!</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('sell') }}" class="square-link">
                        <div class="square" style="background-image: url('../imgs/img-ventas-inicio.jpg');">
                            <div class="text-overlay">
                                <h2>Explora nuestras ventas</h2>
                                <p>Encuentra productos únicos a precios increíbles.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('buy') }}" class="square-link">
                        <div class="square" style="background-image: url('../imgs/img-compras-inicio.jpg');">
                            <div class="text-overlay">
                                <h2>Descubre nuestras compras</h2>
                                <p>Encuentra lo que necesitas en nuestro amplio catálogo.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Banner Ofertas mejorado -->
        <div class="container-fluid d-flex justify-content-center align-items-center exchange p-0">
            <div class="container-fluid mx-5 bg-glass">
                <div class="row">
                    <div class="col-md-8 text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <h3 class="fw-bold">Échale un vistazo a nuestras ofertas de temporada</h3>
                            <p>15% de descuento en todos nuestros productos</p>
                            <a href="/offers" class="btn btn-primary">Ver ofertas</a>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="../imgs/logo_exchange.png">
                    </div>
                </div>
            </div>
        </div>


        <!-- Lo mejor de Exchange -->
        <div class="container py-5">
            <div class="row mt-5">
                <h3>Lo mejor de Exchange</h3>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="circle-container">
                        <a href="{{ route('categories/technology') }}" target="_blank">
                            <!-- Reemplaza URL_de_destino con la URL a la que quieres enlazar -->
                            <div class="circle">
                                <img src="../imgs/productos-tecnologicos.jpg" class="img-fluid" alt="Imagen 1">
                                <div class="circle-overlay">Electrónica</div>
                            </div>
                        </a>
                        <a href="{{ route('categories/home-appliances') }}" target="_blank">
                            <div class="circle">
                                <img src="../imgs/productos-electrodomesticos.jpg" class="img-fluid" alt="Imagen 2">
                                <div class="circle-overlay">Electrodomésticos</div>
                            </div>
                        </a>
                        <a href="{{ route('categories/clothes') }}" target="_blank">
                            <div class="circle">
                                <img src="../imgs/productos-ropa.jpg" class="img-fluid" alt="Imagen 3">
                                <div class="circle-overlay">Ropa</div>
                            </div>
                        </a>
                        <a href="{{ route('categories/household-items') }}" target="_blank">
                            <div class="circle">
                                <img src="../imgs/productos-hogar.jpg" class="img-fluid" alt="Imagen 4">
                                <div class="circle-overlay">Hogar</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
@endsection
