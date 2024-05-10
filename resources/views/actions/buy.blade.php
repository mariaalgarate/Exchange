@extends('layouts.app')
@section('content')
    <style>
        /* Estilos personalizados */
        .banner {
            position: relative;
            height: 300px;
            background: url('https://img.freepik.com/foto-gratis/simbolo-tienda-compras-regalo-tecnologia-cuaderno_1418-12.jpg?t=st=1714566525~exp=1714570125~hmac=f328eca7503539667ae9d685d84af2bf731f657248c51635feb390ccef191538&w=996') center/cover;
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
        <div class="banner">
            <div class="banner-overlay">
                <h1 class="text-overlay">¿Cómo puedo comprar a través de Exchange?</h1>
            </div>
        </div>

        <!--Nuestros productos-->
        <div class="container py-5">
            <h2>Explora nuestra selección de productos</h2>
            <div class="row mt-5">
                @foreach ($productos as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                                <p class="card-text">Precio: {{ $producto->precio_unitario }}</p>
                                <a href="{{ route('show', ['id' => $producto->id]) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--Por qué comprar en Exchange-->
        <div class="container py-5">
            <h2 class="mb-4">¿Por qué comprar en Exchange?</h2>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="exchange-info">
                        <img src="../imgs/icono_calidad.png" alt="Intercambio 1">
                        <h3>Productos de alta calidad</h3>
                        <p>Nos aseguramos de que todos nuestros productos pasen el control de calidad.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="exchange-info">
                        <img src="https://cdn-icons-png.freepik.com/512/9309/9309662.png?uid=R68032537&ga=GA1.1.1247520897.1710362983"
                            alt="Intercambio 2">
                        <h3>Gran variedad de opciones</h3>
                        <p>Descubre nuestras principales categorías, estamos trabajando en más de ellas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="exchange-info">
                        <img src="https://cdn-icons-png.freepik.com/512/11264/11264819.png?uid=R68032537&ga=GA1.1.1247520897.1710362983"
                            alt="Intercambio 3">
                        <h3>Transacciones seguras</h3>
                        <p>Nos comprometemos con la protección de datos y seguridad de nuestros clientes.</p>
                    </div>
                </div>
                <div class="col-md-4 justify-content-center">
                    <div class="exchange-info">
                        <img src="https://cdn-icons-png.freepik.com/512/309/309179.png?uid=R68032537&ga=GA1.1.1247520897.1710362983"
                            alt="Intercambio 3">
                        <h3>Atención al cliente excepcional</h3>
                        <p>Estamos pendientes de nuestros clientes las 24 horas del día, de lunes a sábado.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sección de FAQS -->
        <div class="container py-5">
            <div class="accordion" id="accordionExample">
                <h2 class="mb-4">Preguntas Frecuentes</h2>
                <!-- Primera pregunta -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ¿Qué métodos de pago están disponibles?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Aceptamos varios métodos de pago, incluyendo tarjetas de crédito y débito (como Visa,
                            Mastercard, y American Express),
                            Google Pay, y otros métodos electrónicos.
                            Consulta las opciones disponibles en el proceso de pago para conocer los detalles específicos.
                        </div>
                    </div>
                </div>

                <!-- Segunda pregunta -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿Puedo devolver un producto si no estoy satisfecho?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Sí, ofrecemos un periodo de devolución de 30 días para la mayoría de los productos.
                            El producto debe estar en su empaque original y en condiciones de reventa.
                            Algunos productos, como alimentos y productos personalizados, no pueden ser devueltos.
                            Consulta nuestra política de devoluciones para más detalles.
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
                            ¿Los productos tienen garantía?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Sí, muchos de nuestros productos vienen con garantía.
                            La duración y los términos de la garantía varían según el fabricante y el producto. Si tienes un
                            problema con un producto bajo garantía, contáctanos para obtener asistencia. Guardar el
                            comprobante de compra es importante para hacer válida la garantía.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
