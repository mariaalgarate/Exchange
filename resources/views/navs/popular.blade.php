<?php
use App\Models\producto;
$productos = Producto::all();
?>
@extends('layouts.app')
@section('content')
    <style>
        /* Estilos personalizados */
        .banner {
            position: relative;
            height: 300px;
            background: url('../imgs/bannerLoMasVendido.jpg') center/cover;
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
                <h1 class="text-overlay">¡No te pierdas los favoritos de nuestros clientes! </h1>
            </div>
        </div>
        <div class="container py-5 mb-5">
            <h1>Lo más vendido</h1>
            <div class="product-grid">
                @foreach ($productos as $producto)
                    <!-- Recorrer y mostrar productos -->
                    <div class="product">
                        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                        <h3>{{ $producto->nombre }}</h3>
                        <p>{{ $producto->descripcion }}</p>
                        <span class="price">{{ number_format($producto->precio_unitario, 2) }}€</span>
                        <!-- Precio formateado -->
                        <a href="{{ route('addToCart', ['id' => $producto->id]) }}" class="btn btn-primary">Agregar al
                            carrito</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
<script>
    // Selecciona el botón
    const botonAgregar = document.getElementById('agregar-al-carrito');

    // Agrega un event listener para el clic en el botón
    botonAgregar.addEventListener('click', function() {
        // Agrega la clase 'animacion-agregar' al botón
        botonAgregar.classList.add('animacion-agregar');

        // Después de un tiempo, elimina la clase para que la animación se pueda repetir
        setTimeout(function() {
            botonAgregar.classList.remove('animacion-agregar');
        }, 1000); // Duración de la animación en milisegundos
    });
</script>
