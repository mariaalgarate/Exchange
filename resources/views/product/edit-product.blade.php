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
                    <form method="POST" action="{{ route('edit-product', ['id' => $producto->id]) }}">
                        @csrf                        
                        <label for="nombre">Nombre del producto</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" >

                        <label for="descripcion">Descripcion:</label>
                        <input type="textarea" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}">

                        
                        <div class="mb-3">
                            <label for="imagen" class="form-label">{{ __('Imagen') }}</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{ $producto->imagen }}" required>
                        </div>
                        

                        <label for="estado">Tipo:</label>
                        <select id="estado" name="estado">
                            <option value="Muy Bueno">Muy Bueno</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Desgastado">Desgastado</option>
                        </select>

                        <label for="transaccion">Transacción:</label>
                        <select id="transaccion" name="transaccion">
                            <option value="Venta">Venta</option>
                            <option value="Intercambio">Intercambio</option>
                            <option value="Ambas">Ambas</option>
                        </select>

                        <label for="precio_unitario">Precio unitario:</label>
                        <input type="number" id="precio_unitario" name="precio_unitario" value="{{ $producto->precio_unitario }}">


                        <label for="stock">Stock:</label>
                        <input type="number" id="stock" name="stock" value="{{ $producto->stock}}">

                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}">

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
