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

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Producto') }}</label>
                            <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control" name="nombre" required autofocus>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                            <textarea id="descripcion" class="form-control" name="descripcion" required></textarea>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-end">{{ __('Subir Foto') }}</label>
                            <div class="col-md-6">
                            <input id="imagen" type="file" class="form-control-file" name="imagen" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                            <select id="estado" class="form-select" name="estado" required>
                                <option value="Muy bueno">Muy bueno</option>
                                <option value="Bueno">Bueno</option>
                                <option value="Desgastado">Desgastado</option>
                            </select>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio_unitario" class="col-md-4 col-form-label text-md-end">{{ __('Precio Unitario') }}</label>
                            <div class="col-md-6">
                            <input id="precio_unitario" type="number" class="form-control" name="precio_unitario" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>
                            <div class="col-md-6">
                            <input id="stock" type="number" class="form-control" name="stock" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="transaccion" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de transacción') }}</label>
                            <div class="col-md-6">
                            <select id="transaccion" class="form-select" name="transaccion" required>
                                <option value="Intercambio">Intercambio</option>
                                <option value="Venta">Venta</option>
                                <option value="Ambos">Ambos</option>
                            </select>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad') }}</label>
                            <div class="col-md-6">
                            <input id="cantidad" type="number" class="form-control" name="cantidad" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categorias" class="col-md-4 col-form-label text-md-end">{{ __('Categorías') }}</label>
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                @foreach($categorias as $categoria) <!-- Utiliza la variable $categorias -->
                                    <div class="ingrediente-checkbox">
                                        <input type="checkbox" id="categoria{{ $categoria->id }}" name="categorias[]" value="{{ $categoria->id }}"> {{ $categoria->nombre }}
                                    </div>
                                @endforeach
                            </div>
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
