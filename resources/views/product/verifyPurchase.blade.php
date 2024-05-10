@extends('layouts.app')

@section('content')
    <div class="container mt-5 py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Confirmación de Compra</div>
                    <div class="card-body">
                        <h5>¡Gracias por tu compra!</h5>
                        <p>Detalles del pedido:</p>
                        <ul>
                            <li>Producto: {{ $pedido->producto->nombre }}</li>
                            <li>Precio Total: €{{ number_format($pedido->precio_total, 2) }}</li>
                            <li>Dirección de Envío: {{ $pedido->direccion_envio }}</li>
                            <li>Método de Pago: {{ $pedido->estado_pago }}</li>
                        </ul>
                       <!-- Botón para descargar la factura -->
                       <a href="{{ route('downloadPDF', ['id' => $pedido->id]) }}" class="btn btn-primary">
                        Descargar Factura
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
