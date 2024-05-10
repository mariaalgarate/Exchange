@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">Protección del Vendedor</h2>

            <h3>Registro como vendedor</h3>
            <p>Para comenzar a vender en nuestra plataforma, primero necesitas registrarte como vendedor. Sigue estos pasos:</p>
            <ol>
                <li>Dirígete a la página de registro de vendedores.</li>
                <li>Completa el formulario de registro con tus datos personales y de contacto.</li>
                <li>Acepta nuestros términos y condiciones para vendedores.</li>
                <li>Envía el formulario de registro.</li>
            </ol>

            <h3>Publicación de productos para la venta</h3>
            <p>Una vez que estés registrado como vendedor, puedes comenzar a publicar productos para la venta. Sigue estos pasos:</p>
            <ol>
                <li>Inicia sesión en tu cuenta de vendedor.</li>
                <li>Haz clic en el botón "Publicar Producto".</li>
                <li>Completa el formulario de publicación con los detalles del producto que deseas vender.</li>
                <li>Sube imágenes de alta calidad del producto.</li>
                <li>Establece el precio y las condiciones de venta.</li>
                <li>Envía la publicación del producto.</li>
            </ol>

            <h3>Gestión de ventas</h3>
            <p>Una vez que tus productos estén publicados, puedes gestionar las ventas desde tu cuenta de vendedor. Sigue estos pasos:</p>
            <ol>
                <li>Recibe notificaciones de nuevas ventas.</li>
                <li>Comunícate con los compradores para coordinar el envío o la entrega.</li>
                <li>Confirma la recepción del pago y la satisfacción del comprador.</li>
                <li>Organiza el envío o la entrega del producto según lo acordado.</li>
            </ol>

            <h3>Atención al cliente y soporte</h3>
            <p>Estamos aquí para ayudarte en cada paso del proceso de venta. Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte al vendedor.</p>

            <p class="text-center">Última actualización: {{ date('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection
