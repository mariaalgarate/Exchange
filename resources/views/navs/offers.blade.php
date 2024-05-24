@extends('layouts.app')
@section('content')
    <?php
    use App\Models\Producto; // Corregido, asegúrate de que el nombre del modelo sea correcto
    $productos = Producto::all();
    ?>
    <style>
        /* Estilos personalizados */
        .deal {
            margin-bottom: 20px; /* Espacio inferior entre cada producto */
        }

        .deal img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .deal h3 {
            margin-top: 10px; /* Espacio superior */
            font-size: 1.2em; /* Tamaño del título */
        }

        .badge.bg-danger {
            background-color: #dc3545; /* Cambiar color de fondo a rojo */
            color: white; /* Texto en blanco */
            padding: 5px 10px; /* Espaciado interno */
            border-radius: 5px; /* Borde redondeado */
        }

        .btn {
            background-color: #007bff; /* Azul */
            color: white; /* Texto en blanco */
            padding: 5px 10px; /* Espaciado interno */
            border: none; /* Sin borde */
            border-radius: 5px; /* Borde redondeado */
            text-decoration: none; /* Sin subrayado */
            display: inline-block; /* Alineación en línea */
        }

        .btn:hover {
            background-color: #0056b3; /* Cambio de color al pasar el ratón */
        }
    </style>
    <main class="pb-4">
        <div class="container mt-5">
            <h1>Ofertas Especiales</h1>
            <!-- Lista de productos -->
            <div class="row mt-5 px-5">
                @foreach ($productos as $producto)
                    <div class="col-md-3">
                        <div class="deal">
                            <!-- Imagen -->
                            <img src="{{ asset($producto->imagen) }}" alt="{{ asset($producto->imagen) }}" width="100%">
                            <!-- Nombre -->
                            <h3>{{ $producto->nombre }}</h3>
                            <!-- Estado de agotamiento -->
                            <span class="badge bg-danger">¡A punto de agotarse!</span>
                            <!-- Botón -->
                            <a href="{{ route('show', ['id' => $producto->id]) }}" class="btn">Ver oferta</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
