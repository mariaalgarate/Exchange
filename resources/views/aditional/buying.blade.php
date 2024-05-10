@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">¿Cómo comprar?</h2>

            <h3>Pasos para comprar</h3>
            <ol>
                <li>Selecciona los productos que deseas comprar y agrégalos al carrito de compras.</li>
                <li>Revisa tu carrito de compras y verifica los productos seleccionados y las cantidades.</li>
                <li>Procede al proceso de pago y elige tu método de envío y pago preferido.</li>
                <li>Completa el formulario de pedido con tus datos de envío y facturación.</li>
                <li>Confirma tu pedido y realiza el pago.</li>
                <li>Recibirás un correo electrónico de confirmación con los detalles de tu pedido.</li>
            </ol>

            <h3>Formas de pago</h3>
            <p>Aceptamos los siguientes métodos de pago:</p>
            <ul>
                <li>Tarjeta de crédito</li>
                <li>Transferencia bancaria</li>
                <li>PayPal</li>
            </ul>

            <h3>Política de envío</h3>
            <p>Los pedidos se enviarán dentro de 1-3 días hábiles después de la confirmación del pago. Ofrecemos envío estándar y express a tarifas competitivas.</p>

            <h3>Devoluciones y reembolsos</h3>
            <p>Si no estás satisfecho con tu compra, puedes devolver los productos dentro de los 30 días posteriores a la recepción para obtener un reembolso completo o un cambio.</p>

            <h3>Contacto</h3>
            <p>Si tienes alguna pregunta sobre cómo comprar en nuestro sitio web, no dudes en contactarnos a través de nuestro formulario de contacto o por teléfono.</p>

            <p class="text-center">Última actualización: {{ date('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection
