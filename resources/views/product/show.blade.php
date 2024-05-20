<!-- resources/views/producto/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($producto->imagen) }}" alt="Imagen Producto" style="width: 350px;">
            </div>
            <div class="col-md-6">
                <h2 style="color: var(--bs-primary);" id="titulo-producto">{{ $producto->nombre }}</h2>
                <p style="color: var(--bs-black);" class="mb-3">{{ $producto->descripcion }}</p>
                <p class="mt-5">Precio: <strong>{{ $producto->precio_unitario }}€</strong></p>
                <p>Stock: <span style="color: var(--bs-primary);">{{ $producto->stock }}</span></p>

                <!-- Mostrar las categorías del producto -->
                <p>Categorías:</p>
                @foreach ($producto->categorias as $categoria)
                    <!-- Iterar sobre las categorías -->
                    <li class="badge bg-info mb-5">{{ $categoria->nombre }}</li>
                    <!-- Mostrar el nombre de cada categoría -->
                @endforeach
                <br>
                @switch($producto->transaccion)
                    @case('Intercambio')
                        <!-- Si el producto es para intercambiar -->
                        <button onclick="confirmExchange({{ $producto->id }}, {{ $producto->precio_unitario }})"
                            class="btn btn-primary">Intercambiar</button>
                    @break

                    @case('Venta')
                        <!-- Si el producto es para vender -->
                        <a href="{{ route('purchase', ['id' => $producto->id]) }}" class="btn btn-primary">Comprar</a>
                    @break

                    @case('Ambas')
                        <!-- Si el producto es para intercambiar y vender -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#imageUploaderModal">Intercambiar</button>
                        <a href="{{ route('purchase', ['id' => $producto->id]) }}" class="btn btn-primary">Comprar</a>
                    @break
                @endswitch
                <!-- Botones de aceptar y rechazar intercambio -->
                @if ($correoEnviado && $producto->transaccion=='Intercambio')
                    <div class="row mt-3">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">¿Aceptar o rechazar intercambio?</h5>
                                    <form method="POST" action="{{ route('rejectExchange', ['id' => $producto->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Rechazar Intercambio</button>
                                    </form>
                                    <br>
                                    <form method="POST" action="{{ route('acceptExchange', ['id' => $producto->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Aceptar Intercambio</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Botón para añadir al carrito -->
                <div class="row mb-5">
                    <div class="col-12 py-3">
                        <form action="{{ route('addToCart') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                            <input type="number" name="cantidad_producto" min="1"
                                value="{{ $producto->cantidad }}">
                            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                        </form>
                    </div>
                </div>

                <h2 class="pt-5 mt-5 ">Reseñas</h2>
                <div class="card">
                    <div class="card-body">
                        @forelse ($producto->resenas as $resena)
                            <!-- Mostrar las reseñas -->
                            <div class="mb-3">
                                <p class="text-muted">{{ $resena->created_at }} por
                                    {{ $resena->usuario ? $resena->usuario->nombre : 'Usuario eliminado' }}</p>
                                <p>{{ $resena->comentario }}</p>
                                <p>Valoración:
                                    @for ($i = 0; $i < $resena->valoracion; $i++)
                                        ★
                                    @endfor
                                </p>
                            </div>
                        @empty
                            <p class="text-muted">Todavía no hay reseñas de usuarios.</p>
                        @endforelse
                    </div>
                </div>



                <!-- Modal para subir imágenes -->
                <div class="modal fade" id="imageUploaderModal" tabindex="-1" aria-labelledby="imageUploaderModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageUploaderModalLabel">Subir imágenes del producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="imagenes[]" multiple>
                                    <button type="submit" class="btn btn-primary">Subir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Formulario para agregar reseñas -->
            <div class="row py-5 mb-5 mt-5">
                <div class="col-md-12 mb-4">
                    <h3>Agregar Reseña</h3>
                    <form action="{{ route('addComment', $producto->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="comentario">Comentario:</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="valoracion">Valoración:</label>
                            <select class="form-control" id="valoracion" name="valoracion" required>
                                <option value="1">1 estrella</option>
                                <option value="2">2 estrellas</option>
                                <option value="3">3 estrellas</option>
                                <option value="4">4 estrellas</option>
                                <option value="5">5 estrellas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Reseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botonAnadirAlCarrito = document.querySelector('.btn-anadir-carrito');
            const carritoIcono = document.querySelector(
            '.fas.fa-shopping-cart'); // Icono del carrito en la barra de navegación

            botonAnadirAlCarrito.addEventListener('click', function() {
                const nombreProducto = document.getElementById('titulo-producto').textContent;
                const precioProducto = document.getElementById('precio-producto').textContent;

                // Almacenar las características del producto en el carrito
                localStorage.setItem('carrito_producto', JSON.stringify({
                    nombre: nombreProducto,
                    precio: precioProducto
                }));
            });

            // Mostrar las características del producto al pasar el cursor sobre el icono del carrito
            carritoIcono.addEventListener('mouseover', function() {
                const carritoProducto = JSON.parse(localStorage.getItem('carrito_producto'));

                // Verificar si hay un producto en el carrito
                if (carritoProducto) {
                    // Mostrar las características del producto como un título emergente en el icono del carrito
                    carritoIcono.title =
                        `Producto: ${carritoProducto.nombre}\nPrecio: ${carritoProducto.precio}`;
                }
            });

            // Limpiar las características del producto al quitar el cursor del icono del carrito
            carritoIcono.addEventListener('mouseout', function() {
                carritoIcono.title = '';
            });
        });
    </script>



    <!--Controlador de Intercambio Precio-->
    <script>
        function confirmExchange(idProducto, precioOriginal) {
            // Rango de tolerancia (10 € por arriba y por abajo)
            const rangoInferior = precioOriginal - 10;
            const rangoSuperior = precioOriginal + 10;

            const mensaje = `¿Tu producto está entre ${rangoInferior} € y ${rangoSuperior} €?`;

            if (confirm(mensaje)) {
                // URL de redirección a la página de intercambio
                const exchangeUrl = "{{ route('exchange-product', $producto->id) }}";

                // Redirigir al usuario a la URL para intercambiar producto
                window.location.href = exchangeUrl;
            } else {
                alert("El producto no está dentro del rango permitido para el intercambio.");
            }
        }
    </script>


 <!--Aceptar o rechazar intercambio-->
 <script>
    function confirmExchange(idProducto, precioOriginal) {
        // Rango de tolerancia (10 € por arriba y por abajo)
        const rangoInferior = precioOriginal - 10;
        const rangoSuperior = precioOriginal + 10;

        const mensaje = `¿Tu producto está entre ${rangoInferior} € y ${rangoSuperior} €?`;

        if (confirm(mensaje)) {
            // URL de redirección a la página de intercambio
            const exchangeUrl = "{{ route('exchange-product', $producto->id) }}";

            // Redirigir al usuario a la URL para intercambiar producto
            window.location.href = exchangeUrl;
        } else {
            alert("El producto no está dentro del rango permitido para el intercambio.");
        }
    }
</script>
@endsection
