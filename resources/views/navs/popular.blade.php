<?php
use App\Models\Producto;
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

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between; /* Distribuye espacio uniformemente */
        }

        .product {
            flex: 1 1 calc(33.333% - 20px); /* Toma 33.333% del ancho menos 20px de margen */
            box-sizing: border-box;
            margin: 10px 0;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
        }

        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .product {
                flex: 1 1 calc(50% - 20px); /* Toma 50% del ancho menos 20px de margen */
            }
        }

        @media (max-width: 576px) {
            .product {
                flex: 1 1 100%; /* Toma 100% del ancho en pantallas pequeñas */
            }
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
                        <img src="{{ asset($producto->imagen) }}" alt="{{ asset($producto->imagen) }}" width="100px">
                        <h3>{{ $producto->nombre }}</h3>
                        <p>{{ $producto->descripcion }}</p>
                        <span class="price">{{ number_format($producto->precio_unitario, 2) }}€</span><br><br>
                        <!-- Precio formateado -->
                        <form action="{{ route('addToCart') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                            <input type="number" name="cantidad_producto" min="1"
                                value="{{ $producto->cantidad }}">
                            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
<script>
    document.querySelectorAll('.btn.btn-primary').forEach(button => {
        button.addEventListener('click', function() {
            button.classList.add('animacion-agregar');
            setTimeout(() => {
                button.classList.remove('animacion-agregar');
            }, 1000);
        });
    });
</script>
