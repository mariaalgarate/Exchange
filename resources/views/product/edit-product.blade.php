@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Producto') }}</div>

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

                    <form method="POST" action="{{ route('edit-product', ['id' => $producto->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="row mb-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-end">Imagen (opcional):</label>
                            <div class="col-md-6">
                            <input type="file" class="form-control" name="imagen">
                        </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                                <option value="Muy Bueno" {{ old('estado', $producto->estado) == 'Muy Bueno' ? 'selected' : '' }}>Muy Bueno</option>
                                <option value="Bueno" {{ old('estado', $producto->estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                                <option value="Desgastado" {{ old('estado', $producto->estado) == 'Desgastado' ? 'selected' : '' }}>Desgastado</option>
                            </select>
                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="transaccion">Transacción</label>
                            <select class="form-control @error('transaccion') is-invalid @enderror" id="transaccion" name="transaccion" required>
                                <option value="Venta" {{ old('transaccion', $producto->transaccion) == 'Venta' ? 'selected' : '' }}>Venta</option>
                                <option value="Intercambio" {{ old('transaccion', $producto->transaccion) == 'Intercambio' ? 'selected' : '' }}>Intercambio</option>
                                <option value="Ambas" {{ old('transaccion', $producto->transaccion) == 'Ambas' ? 'selected' : '' }}>Ambas</option>
                            </select>
                            @error('transaccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="precio_unitario">Precio unitario</label>
                            <input type="number" class="form-control @error('precio_unitario') is-invalid @enderror" id="precio_unitario" name="precio_unitario" value="{{ old('precio_unitario', $producto->precio_unitario) }}" min="0" max="10000" required>
                            @error('precio_unitario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" min="0" max="1000" required>
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}" min="0" max="1000" required>
                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="categorias">Categorías</label>
                            <div class="row justify-content-center">
                                @foreach($categorias as $categoria)
                                    <div class="ingrediente-checkbox">
                                        <input type="checkbox" id="categoria{{ $categoria->id }}" name="categorias[]" value="{{ $categoria->id }}" {{ in_array($categoria->id, old('categorias', $producto->categorias->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <label for="categoria{{ $categoria->id }}">{{ $categoria->nombre }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categorias')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <br>
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
