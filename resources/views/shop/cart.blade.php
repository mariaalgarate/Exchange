@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">Tu Carrito de Compras</h2>

            @php
                $total = 0; // Iniciar el total
            @endphp

            @foreach ($carritos as $carrito)
                @php
                    $producto = $carrito->producto; // Acceder al producto desde la relación
                    // Sumar al total el precio unitario multiplicado por la cantidad
                    $total += $producto->precio_unitario * $carrito->cantidad_producto;
                @endphp
                <div class="card mb-4 mt-5">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="{{ asset($producto->imagen) }}" class="img-fluid rounded-start" alt="{{ $producto->nombre }}">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                                <p class="card-text">Precio: {{ number_format($producto->precio_unitario, 2) }}€</p>
                                Cantidad
                                <input type="number" name="cantidad_producto" min="1" value="{{ $carrito->cantidad_producto }}" class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                     <form action="{{ route('cart/remove', ['id' => $carrito->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-between align-items-center">
                <!-- Mostrar el total -->
                <h4>Total: {{ number_format($total, 2) }}€</h4>
                <a href="{{ route('buy') }}" class="btn btn-primary">Continuar Comprando</a>
            </div>
        </div>
    </div>
</div>
@endsection
