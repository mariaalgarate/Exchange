@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Resultados de la búsqueda para "{{ $query }}"</h1>
    @if($productos->isEmpty())
        <p>No se encontraron productos para tu búsqueda.</p>
    @else
        <div class="row mt-5">
            @foreach($productos as $product) <!-- Cambiar $products a $productos -->
                <div class="col-md-4"> <!-- Dividir en columnas -->
                    <div class="card mb-3"> <!-- Uso de tarjetas para mejor presentación -->
                        <img src="{{ asset($product->imagen) }}" class="card-img-top" alt="{{ asset($product->imagen) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nombre }}</h5>
                            <p class="card-text">{{ $product->precio_unitario }}€</p> <!-- Mostrar precio formateado -->
                            <a href="{{ route('show', ['id' => $product->id]) }}" class="btn btn-primary">Ver producto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
