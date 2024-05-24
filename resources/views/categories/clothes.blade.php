<style>
    /* Estilos personalizados */
    .banner {
        position: relative;
        height: 300px;
        background: url('../imgs/bannerClothes.jpg') center/cover;
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

    .category-menu {
        border-right: 1px solid #ddd;
    }

    .product-section {
        padding: 20px;
    }
</style>


@extends('layouts.app')
        @section('content')
        <main class="pb-4">
            <div class="banner">
                <div class="banner-overlay">
                    <h1 class="text-overlay">Nuestras tendencias en ropa</h1>
                </div>
            </div>
            
            <div class="container-fluid mt-5">
                <div class="row mt-4">
                    <div class="col-md-3 category-menu">
                        <!-- Aquí va el menú de categorías -->
                        <h2>Categorías</h2>
                        <ul class="list-unstyled" style="line-height: 30px;">
                            <li><a href="#" class="link-category">Ropa de mujer</a></li>
                            <li><a href="#" class="link-category">Ropa de hombre</a></li>
                            <li><a href="#" class="link-category">Ropa de niños</a></li>
                            <li><a href="#" class="link-category">Camisas y camisetas</a></li>
                            <li><a href="#" class="link-category">Pantalones y jeans</a></li>
                            <li><a href="#" class="link-category">Ropa deportiva</a></li>
                            <li><a href="#" class="link-category">Accesorios</a></li>
                            <li><a href="#" class="link-category">Calzado</a></li>
                            <li><a href="#" class="link-category">Para ocasiones especiales</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-md-9 product-section mt-5">
                        <!-- Novedades -->
                        <h2>Novedades</h2>
                        <div class="row mt-4">
                            <!-- Producto 1 -->
                            @foreach ($productos as $producto)
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($producto->imagen) }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text">{{ $producto->descripcion }}</p>
                                        <p class="card-text">Precio: {{ number_format($producto->precio_unitario, 2) }}€</p>
                                        <a href="{{ route('show', ['id' => $producto->id]) }}" class="btn btn-primary">Ver Producto</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
            
                        <div class="col-md-9 product-section mt-5">
                            <!-- Lo más vendido -->
                            <h2>Lo más vendido (0-20€)</h2>
                        
                            <!-- Filtrar la colección para obtener solo productos <= 20€ -->
                            @php
                                $productosMenoresA20 = $productos->filter(function ($producto) {
                                    return $producto->precio_unitario <= 20;
                                });
                            @endphp
                        
                            @if($productosMenoresA20->isEmpty())
                                <p>No hay productos en esta categoría por menos de 20€.</p>
                            @else
                                <div class="row mt-4">
                                    @foreach ($productosMenoresA20 as $producto)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                                <p class="card-text">{{ $producto->descripcion }}</p>
                                                <p class="card-text">Precio: {{ number_format($producto->precio_unitario, 2) }}€</p>
                                                <a href="{{ route('show', ['id' => $producto->id]) }}" class="btn btn-primary">Ver Producto</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    @endsection
            