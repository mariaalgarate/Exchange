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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('upload-product') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Producto') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-end">Imagen (opcional):</label>
                            <div class="col-md-6">
                            <input type="file" class="form-control" name="imagen">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <select id="estado" class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                                    <option value="Muy bueno">Muy bueno</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Desgastado">Desgastado</option>
                                </select>
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio_unitario" class="col-md-4 col-form-label text-md-end">{{ __('Precio Unitario') }}</label>
                            <div class="col-md-6">
                                <input id="precio_unitario" type="number" class="form-control @error('precio_unitario') is-invalid @enderror" name="precio_unitario" value="{{ old('precio_unitario') }}" required>
                                @error('precio_unitario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required>
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="transaccion" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de transacción') }}</label>
                            <div class="col-md-6">
                                <select id="transaccion" class="form-select @error('transaccion') is-invalid @enderror" name="transaccion" required>
                                    <option value="Intercambio">Intercambio</option>
                                    <option value="Venta">Venta</option>
                                    <option value="Ambos">Ambos</option>
                                </select>
                                @error('transaccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad') }}</label>
                            <div class="col-md-6">
                                <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required>
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categorias" class="col-md-4 col-form-label text-md-end">{{ __('Categorías') }}</label>
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                    @foreach($categorias as $categoria)
                                        <div class="ingrediente-checkbox">
                                            <input type="checkbox" id="categoria{{ $categoria->id }}" name="categorias[]" value="{{ $categoria->id }}"> {{ $categoria->nombre }}
                                        </div>
                                    @endforeach
                                </div>
                                @error('categorias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
