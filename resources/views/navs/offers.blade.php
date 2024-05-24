@extends('layouts.app')

@section('content')
<main class="pb-4">
    <div class="banner">
        <div class="banner-overlay">
            <h1 class="text-overlay">¡Descubre nuestras ofertas especiales!</h1>
            <p>¡Aprovecha ahora y encuentra los mejores descuentos en productos seleccionados!</p>
        </div>
    </div>

    <!-- Lista de productos -->
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($productos as $producto)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <span class="badge bg-danger">¡A punto de agotarse!</span>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('show', ['id' => $producto->id]) }}" class="btn btn-primary">Ver oferta</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Banner de Ofertas destacadas -->
    <div class="container-fluid d-flex justify-content-center align-items-center exchange p-0 mt-5">
        <div class="container-fluid mx-5 bg-glass">
            <div class="row">
                <div class="col-md-8 text-center">
                    <h3 class="fw-bold mb-3">Descubre nuestras ofertas más destacadas de cada categoría deslizando hacia abajo</h3>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('imgs/logo_exchange.png') }}" alt="Logo Exchange">
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
