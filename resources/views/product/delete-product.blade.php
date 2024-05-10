@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eliminar Producto') }}</div>

                <div class="card-body">
                    <p class="text-danger">¡ATENCIÓN!</p>
                    <p>¿Está seguro de que desea eliminar este producto? Esta acción es irreversible y eliminará el producto de forma permanente.</p>
                    <form method="POST" action="{{ route('delete-product', ['id' => $producto->id]) }}">
                        @csrf
                        @method('DELETE')
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">{{ __('Eliminar Producto') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
