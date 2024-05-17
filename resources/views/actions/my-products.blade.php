@extends('layouts.app')

@section('content')
<div class="container mt-5 px-4 py-4">
    <h1>Mis Productos</h1>

    @if($productos->isEmpty())
        <p>No has subido ningún producto todavía.</p>
    @else
        <div class="row mt-5">
            @foreach($productos as $producto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="100px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('show', $producto->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                                <a href="{{ route('edit-product', $producto->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                                <a href="{{ route('delete-product', $producto->id) }}" class="btn btn-sm btn-outline-secondary">Eliminar</a>
                            </div>
                            <small class="text-muted">Stock: {{ $producto->stock }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <!-- Botón para subir un nuevo producto -->
    <div class="mt-4">
        <a href="{{ route('upload-product') }}" class="btn btn-primary">Subir producto</a>
    </div>
</div>
@endsection
