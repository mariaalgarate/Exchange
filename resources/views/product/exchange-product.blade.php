@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Rellene el formulario de su producto para el Intercambio</div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('uploadExchange', ['id' => $producto->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción del Producto</label>
                                <textarea class="form-control" name="descripcion" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="precio_unitario" class="form-label">Precio</label>
                                <input type="number" class="form-control" name="precio_unitario" required>
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado del Producto</label>
                                <select class="form-control" name="estado" required>
                                    <option value="Muy Bueno">Muy Bueno</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Desgastado">Desgastado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Subir Imágenes</label>
                                <input type="file" class="form-control" name="imagen" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
