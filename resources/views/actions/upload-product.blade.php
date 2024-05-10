<?php
use App\Models\Categoria;
$categorias = Categoria::all();
?>

@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Subir Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('upload-product') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="nombre" class="form-label">{{ __('Nombre del Producto') }}</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" required autofocus>
                        </div>

                        <div class="form-group mb-4">
                            <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
                            <textarea id="descripcion" class="form-control" name="descripcion" required></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="imagen" class="form-label">{{ __('Subir Foto') }}</label>
                            <input id="imagen" type="file" class="form-control-file" name="imagen" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="estado" class="form-label">{{ __('Estado') }}</label>
                            <select id="estado" class="form-select" name="estado" required>
                                <option value="Muy bueno">Muy bueno</option>
                                <option value="Bueno">Bueno</option>
                                <option value="Desgastado">Desgastado</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="precio_unitario" class="form-label">{{ __('Precio Unitario') }}</label>
                            <input id="precio_unitario" type="number" class="form-control" name="precio_unitario" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="stock" class="form-label">{{ __('Stock') }}</label>
                            <input id="stock" type="number" class="form-control" name="stock" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="transaccion" class="form-label">{{ __('Tipo de transacción') }}</label>
                            <select id="transaccion" class="form-select" name="transaccion" required>
                                <option value="Intercambio">Intercambio</option>
                                <option value="Venta">Venta</option>
                                <option value="Ambos">Ambos</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
                            <input id="cantidad" type="number" class="form-control" name="cantidad" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="categorias" class="mb-3">{{ __('Categorías') }}</label>
                             <div class="ingredientes-row">
                                @foreach($categorias as $categoria) <!-- Utiliza la variable $categorias -->
                                    <div class="ingrediente-checkbox">
                                        <input type="checkbox" id="categoria{{ $categoria->id }}" name="categorias[]" value="{{ $categoria->id }}"> {{ $categoria->nombre }}
                                    </div>
                                @endforeach
                            </div>
                        </div>       

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Subir Producto') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
