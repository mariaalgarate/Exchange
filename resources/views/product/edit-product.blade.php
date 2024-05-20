<?php
use App\Models\Categoria;
$categorias = Categoria::all();
?>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('edit-product', ['id' => $producto->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="form-label">{{ __('Imagen') }}</label>
                            <input id="imagen" type="file" class="form-control-file" name="imagen" required>
                        </div>

                        <div class="form-group">
                            <label for="estado">Tipo</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="Muy Bueno" {{ $producto->estado == 'Muy Bueno' ? 'selected' : '' }}>Muy Bueno</option>
                                <option value="Bueno" {{ $producto->estado == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                                <option value="Desgastado" {{ $producto->estado == 'Desgastado' ? 'selected' : '' }}>Desgastado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="transaccion">Transacción</label>
                            <select class="form-control" id="transaccion" name="transaccion">
                                <option value="Venta" {{ $producto->transaccion == 'Venta' ? 'selected' : '' }}>Venta</option>
                                <option value="Intercambio" {{ $producto->transaccion == 'Intercambio' ? 'selected' : '' }}>Intercambio</option>
                                <option value="Ambas" {{ $producto->transaccion == 'Ambas' ? 'selected' : '' }}>Ambas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="precio_unitario">Precio unitario</label>
                            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" value="{{ $producto->precio_unitario }}">
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}">
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}">
                        </div>

                        <div class="form-group">
                            <label for="categorias">Categorías</label>
                            <select name="categorias[]" class="form-control" multiple>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ in_array($categoria->id, $producto->categorias->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
