@extends('layouts.app')
@section('content')
    <style>
        /* Estilos personalizados */
        .banner {
            position: relative;
            height: 300px;
            background: url('https://img.freepik.com/foto-gratis/pantalla-blanco-ordenador-portatil-salto-carrito-lleno-regalos-copyspace-concepto-compras-linea_1423-92.jpg?t=st=1714566387~exp=1714569987~hmac=b710ee6df6f548a7590d6153d9d787acbf08b3e23e2a6a429a35f685898e2a1c&w=996') bottom/cover;
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
                <h1 class="text-overlay">¿Cómo realizar ventas?</h1>
            </div>
        </div>

        <div class="container py-5 mb-5 text-center">
            <h2>¿Qué debes saber?</h2>
            <div class="row d-flex justify-content-around mt-5">
                <div class="col">
                    <div class="process-step h-100 d-flex flex-column justify-content-between">
                        <div class="step-number step1 text-center">1</div>
                        <h3 class="step-title">Anunciar es gratis</h3>
                        <p class="step-description">En exchange, comenzar a vender es tan fácil como gratis.
                            Sin cargos de inicio ni tarifas mensuales, tú estableces tus términos y condiciones.
                            Únete a nuestra plataforma y comienza a ganar hoy mismo.</p>
                        <div>
                            <hr class="step-divider step1">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="process-step h-100 d-flex flex-column justify-content-between">
                        <div class="step-number step2 text-center">2</div>
                        <h3 class="step-title">Protección Integral</h3>
                        <p class="step-description">En Exchange, nos aseguramos de proteger a nuestros
                            vendedores con políticas sólidas y un servicio de atención al cliente siempre
                            disponible para ayudarte. Obtén más detalles sobre cómo protegemos a nuestros vendedores.</p>
                        <div>
                            <hr class="step-divider step2">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="process-step h-100 d-flex flex-column justify-content-between">
                        <div class="step-number step3 text-center">3</div>
                        <h3 class="step-title">Expande tus Horizontes</h3>
                        <p class="step-description">Exchange te brinda acceso a una audiencia global de más
                            de 180 millones de compradores. Únete a nuestra plataforma y lleva tus productos
                            a nuevos mercados en todo el mundo. Comienza a vender hoy mismo.</p>
                        <div>
                            <hr class="step-divider step3">
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
                            <h3 class="fw-bold mb-3">Sube tus productos</h3>
                            <p>Clica en el siguiente botón para comenzar a vender tus productos</p>
                            <a href="{{ route('upload-product') }}" class="btn btn-primary">Realizar venta</a>
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
            <div class="container py-5">
                <h2 class="mb-4">Preguntas Frecuentes</h2>
                <!-- Comisiones por Venta -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ¿Cuáles son las comisiones por vender un producto?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            El marketplace cobra una comisión por cada venta realizada. La comisión puede ser un porcentaje
                            del precio del producto o una tarifa fija. Consulta nuestra página de tarifas y comisiones para
                            obtener información detallada sobre las tasas aplicables a cada tipo de producto y el momento de
                            cobro.
                        </div>
                    </div>
                </div>

                <!-- Cómo Listar Productos -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿Cómo puedo listar mis productos para la venta?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Para listar tus productos, debes crear una cuenta de vendedor. Una vez registrado, puedes usar
                            el panel de control para agregar productos. Deberás proporcionar detalles como el nombre del
                            producto, descripción, imágenes de alta calidad, precio, y condiciones de envío. Sigue las guías
                            del marketplace para obtener mejores resultados.
                        </div>
                    </div>
                </div>

                <!-- Tiempo de Procesamiento -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            ¿Cuánto tiempo tengo para procesar un pedido?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Una vez que recibas un pedido, tienes un tiempo determinado para procesarlo y enviarlo.
                            Normalmente, este tiempo es entre 1 y 3 días hábiles, pero puede variar según tu configuración y
                            la ubicación del comprador. Asegúrate de cumplir con los tiempos de procesamiento para evitar
                            penalizaciones y brindar una buena experiencia al cliente.
                        </div>
                    </div>
                </div>

                <!-- Políticas de Reembolso -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            ¿Cuál es la política de reembolsos para vendedores?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Como vendedor, es importante conocer la política de reembolsos del marketplace. En general, se
                            espera que aceptes devoluciones y reembolsos en ciertas condiciones, como productos defectuosos
                            o no como se describieron. Revisa la política de reembolsos para conocer tus obligaciones y
                            derechos como vendedor.
                        </div>
                    </div>
                </div>

                <!-- Calificaciones y Comentarios -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            ¿Cómo afectan las calificaciones y comentarios a mi reputación como vendedor?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Las calificaciones y comentarios de los compradores son importantes para establecer tu
                            reputación como vendedor. Altas calificaciones pueden mejorar tu visibilidad y atraer más
                            compradores, mientras que bajas calificaciones pueden afectar negativamente tus ventas.
                            Asegúrate de ofrecer un buen servicio, productos de calidad, y respuestas rápidas para mantener
                            una buena reputación.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
