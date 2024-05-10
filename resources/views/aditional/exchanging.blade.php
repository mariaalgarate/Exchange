@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">¿Cómo intercambiar?</h2>

            <h3>Registro de cuenta</h3>
            <p>Para comenzar a intercambiar en nuestra plataforma, primero necesitas registrarte como usuario. Sigue estos pasos:</p>
            <ol>
                <li>Dirígete a la página de registro.</li>
                <li>Completa el formulario de registro con tus datos personales y de contacto.</li>
                <li>Acepta nuestros términos y condiciones.</li>
                <li>Envía el formulario de registro.</li>
            </ol>

            <h3>Búsqueda de productos para intercambiar</h3>
            <p>Una vez que estés registrado y hayas iniciado sesión, puedes comenzar a buscar productos para intercambiar. Sigue estos pasos:</p>
            <ol>
                <li>Navega por las categorías de productos disponibles en nuestra plataforma.</li>
                <li>Utiliza la barra de búsqueda para encontrar productos específicos.</li>
                <li>Explora las listas de productos disponibles para intercambiar.</li>
            </ol>

            <h3>Selección de productos para intercambiar</h3>
            <p>Una vez que hayas encontrado un producto que te interese intercambiar, sigue estos pasos:</p>
            <ol>
                <li>Haz clic en el producto para ver más detalles.</li>
                <li>Lee la descripción del producto y verifica las condiciones de intercambio.</li>
                <li>Selecciona el producto que deseas intercambiar.</li>
            </ol>

            <h3>Propuesta de intercambio</h3>
            <p>Una vez que hayas seleccionado los productos que deseas intercambiar, puedes enviar una propuesta de intercambio al propietario del producto. Sigue estos pasos:</p>
            <ol>
                <li>Haz clic en el botón "Enviar Propuesta de Intercambio".</li>
                <li>Completa el formulario de propuesta de intercambio con detalles sobre los productos que estás ofreciendo a cambio.</li>
                <li>Envía la propuesta de intercambio.</li>
            </ol>

            <h3>Confirmación del intercambio</h3>
            <p>Una vez que el propietario del producto haya revisado tu propuesta de intercambio, puede aceptarla, rechazarla o proponer una contraoferta. Sigue estos pasos:</p>
            <ol>
                <li>Revisa las notificaciones para ver si tu propuesta de intercambio ha sido aceptada.</li>
                <li>Confirma los detalles del intercambio y procede según corresponda.</li>
            </ol>

            <h3>Finalización del intercambio</h3>
            <p>Una vez que ambas partes hayan confirmado el intercambio, procede con la finalización del proceso. Sigue estos pasos:</p>
            <ol>
                <li>Organiza el envío o la entrega de los productos según lo acordado.</li>
                <li>Confirma la recepción de los productos y la satisfacción con el intercambio.</li>
            </ol>

            <h3>Atención al cliente y soporte</h3>
            <p>Estamos aquí para ayudarte en cada paso del proceso de intercambio. Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte al cliente.</p>

            <p class="text-center">Última actualización: {{ date('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection
