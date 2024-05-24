<?php
use App\Models\Producto; // Corregido, asegúrate de que el nombre del modelo sea correcto
$productos = Producto::all();
?>

@extends('layouts.app')
@section('content')
<style>
    /* Estilos personalizados */
    .banner {
        position: relative;
        height: 300px;
        background: url('../imgs/bannerOfertas.jpg') center/cover;
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
            <h1 class="text-overlay">¡Descubre nuestras ofertas especiales!</h1>
            <p>¡Aprovecha ahora y encuentra los mejores descuentos en productos seleccionados!</p>
        </div>
    </div>

    <!-- Lista de productos -->
    <div class="container py-5 mb-5">
        <div class="product-grid">
            <!-- El bucle foreach debería estar dentro de un contenedor adecuado -->
            @foreach ($productos as $producto)
                <div class="product">
                    <img src="{{ asset($producto->imagen) }}" alt="{{ asset($producto->imagen) }}" width="100px">
                    <h3>{{ $producto->nombre }}</h3>
                        <span class="badge bg-danger">¡A punto de agotarse!</span>
                        <a href="{{ route('show', ['id' => $producto->id]) }}" class="btn">Ver oferta</a> <!-- Asegúrate de usar clases consistentes -->
                </div>
            @endforeach
        </div>
    </div>

    <!-- Banner de Ofertas destacadas -->
    <div class="container-fluid d-flex justify-content-center align-items-center exchange p-0 mt-5"> <!-- Se agregó margen superior -->
        <div class="container-fluid mx-5 bg-glass">
            <div class="row">
                <div class="col-md-8 text-center d-flex flex-column justify-content-center align-items-center">
                    <h3 class="fw-bold mb-3">Descubre nuestras ofertas más destacadas de cada categoría deslizando hacia abajo</h3> <!-- Ajustes de formato -->
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('imgs/logo_exchange.png') }}" alt="Logo Exchange"> <!-- Corregido con `asset` y `alt` -->
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
