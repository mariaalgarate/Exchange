@extends('layouts.app')
@section('content')
    <style>
        /* Estilos personalizados */
        .banner {
            position: relative;
            height: 300px;
            background: url('../imgs/bannerIntercambio.jpg') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
    <main class="pb-4">

        <!--Banner Principal-->
        <div class="banner">
            <div class="banner-overlay">
                <h1 class="text-overlay">¿Cómo hago un intercambio?</h1>
            </div>
        </div>


        <!--Te enseñamos a Intercambiar-->
        <div class="container py-5">
            <h2 class="mb-5">Te enseñamos a intercambiar</h2>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="exchange-info">
                        <img src="../imgs/icono_buscar.png" alt="Intercambio 1">
                        <h3>Paso 1: Encuentra tu producto</h3>
                        <p>Explora nuestra amplia selección de productos y encuentra el que deseas intercambiar.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="exchange-info">
                        <img src="../imgs/icono_mensaje.png" alt="Intercambio 2">
                        <h3>Paso 2: Contacta al vendedor</h3>
                        <p>Contacta al vendedor del producto que te interesa para proponer el intercambio.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="exchange-info">
                        <img src="../imgs/icono_intercambiar.png" alt="Intercambio 3">
                        <h3>Paso 3: Finaliza el intercambio</h3>
                        <p>Acuerda los términos del intercambio con el vendedor y finaliza la transacción.</p>
                    </div>
                </div>
            </div>
        </div>


        <!--Cómo Intercambiar-->
        <div class="container py-5">
            <h2 class="mb-4">Cómo tener éxito en tus intercambios</h2>
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 border-primary bg-white">
                        <div class="card-body d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-3 d-none d-md-flex align-items-center">
                                    <img class="img-fluid" src="../imgs/icono_comunicacion.png">
                                </div>
                                <div class="col-md-9">
                                    <h5 class="card-title">Comunicación clara</h5>
                                    <div class="line-3-100"></div>
                                    <p class="card-text">Mantén una comunicación abierta y clara con el vendedor para evitar
                                        malentendidos.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 border-primary bg-white">
                        <div class="card-body d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-3 d-none d-md-flex align-items-center">
                                    <img class="img-fluid" src="../imgs/icono_investigacion.png">
                                </div>
                                <div class="col-md-9">
                                    <h5 class="card-title">Investigación previa</h5>
                                    <div class="line-3-100"></div>
                                    <p class="card-text">Investiga el producto y al vendedor antes de realizar el
                                        intercambio para asegurarte de obtener lo que esperas.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-5 border-primary bg-white">
                        <div class="card-body d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-3 d-none d-md-flex align-items-center">
                                    <img class="img-fluid" src="../imgs/icono_confianza.png">
                                </div>
                                <div class="col-md-9">
                                    <h5 class="card-title">Confianza mutua</h5>
                                    <div class="line-3-100"></div>
                                    <p class="card-text">Establece una relación de confianza con el vendedor para garantizar
                                        una transacción exitosa.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!--Banner Intercambio-->
                <div class="container-fluid d-flex justify-content-center align-items-center exchange p-0">
                    <div class="container-fluid mx-5 bg-glass">
                        <div class="row">
                            <div class="col-md-8 text-center d-flex flex-column justify-content-center align-items-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <h3 class="fw-bold mb-3">Clica en el siguiente botón para comenzar a intercambiar</h3>
                                    <a href="{{ route('upload-product') }}" class="btn btn-primary">Realizar Intercambio</a>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid" src="../imgs/logo_exchange.png">
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Sección de FAQS -->
                <div class="accordion" id="accordionExample">
                    <h2 class="mb-4">Preguntas Frecuentes</h2>
                    <!-- Primera pregunta -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Cómo funciona el intercambio en este marketplace?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                El marketplace permite a los usuarios intercambiar bienes y servicios. Los usuarios pueden
                                listar sus artículos y buscar otros que les interesen. Una vez que encuentran un intercambio
                                adecuado, se pueden comunicar entre ellos para organizar el intercambio. El marketplace
                                puede tener sistemas de verificación y mediación para asegurar transacciones justas y
                                seguras.
                            </div>
                        </div>
                    </div>

                    <!-- Segunda pregunta -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Es necesario hacer un pago por el intercambio?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                En general, el intercambio se basa en trueque, por lo que no es necesario hacer pagos. Sin
                                embargo, algunos usuarios pueden acordar pagos adicionales si el valor de los artículos es
                                diferente. Asegúrate de discutir todos los términos antes de finalizar el intercambio.
                            </div>
                        </div>
                    </div>

                    <!-- Tercera pregunta -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Quién paga el costo del envío?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                El costo del envío generalmente es negociado entre las partes que intercambian. Algunas
                                veces, cada parte paga su propio envío, o se puede acordar dividir el costo. El marketplace
                                no se responsabiliza por los costos de envío, pero puede ofrecer recomendaciones sobre
                                proveedores de servicios de envío.
                            </div>
                        </div>
                    </div>

                    <!-- Cuarta pregunta -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ¿Es seguro intercambiar en este marketplace?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                El marketplace implementa medidas de seguridad para proteger a los usuarios, como sistemas
                                de verificación, calificaciones de usuarios, y protección contra fraudes. Sin embargo, es
                                importante que los usuarios sigan prácticas seguras, como verificar las calificaciones del
                                otro usuario, comunicarse solo a través del marketplace, y nunca compartir información
                                personal sensible.
                            </div>
                        </div>
                    </div>

                    <!-- Quinta pregunta -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                ¿Qué sucede si hay un problema con el intercambio?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Si surge un problema con el intercambio, como un artículo dañado o diferente de lo esperado,
                                el marketplace puede ofrecer mediación para resolver el conflicto. El primer paso siempre es
                                comunicarte con el otro usuario para resolver el problema. Si no se puede resolver, puedes
                                contactar con el soporte del marketplace para obtener ayuda.
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
