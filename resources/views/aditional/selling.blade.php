@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">¿Cómo vender?</h2>

            <h3>Registro como vendedor</h3>
            <p>Para comenzar a vender en nuestra plataforma, primero necesitas registrarte como vendedor. Sigue estos pasos:</p>
            <ol>
                <li>Dirígete a la página de registro.</li>
                <li>Completa el formulario de registro con tus datos personales y de contacto.</li>
                <li>Selecciona la opción de registrarse como vendedor.</li>
                <li>Acepta nuestros términos y condiciones para vendedores.</li>
                <li>Envía el formulario de registro.</li>
            </ol>

            <h3>Crear tu tienda</h3>
            <p>Una vez que te hayas registrado como vendedor, puedes crear tu propia tienda en nuestra plataforma. Sigue estos pasos:</p>
            <ol>
                <li>Inicia sesión en tu cuenta de vendedor.</li>
                <li>Ve a la sección de "Mi Tienda" o "Configuración".</li>
                <li>Completa la información de tu tienda, incluyendo el nombre, la descripción, el logotipo y las políticas de venta.</li>
                <li>Guarda los cambios y tu tienda estará activa.</li>
            </ol>

            <h3>Publicar productos</h3>
            <p>Una vez que tu tienda esté activa, puedes comenzar a publicar tus productos para la venta. Sigue estos pasos:</p>
            <ol>
                <li>Inicia sesión en tu cuenta de vendedor.</li>
                <li>Ve a la sección de "Mis Productos" o "Gestión de Productos".</li>
                <li>Haz clic en el botón "Agregar Producto" o "Nuevo Producto".</li>
                <li>Rellena la información del producto, incluyendo el nombre, la descripción, las imágenes y el precio.</li>
                <li>Guarda el producto y estará disponible para la venta en tu tienda.</li>
            </ol>

            <h3>Recibir pedidos y gestionar ventas</h3>
            <p>Cuando un cliente realice un pedido en tu tienda, recibirás una notificación y podrás gestionar la venta. Sigue estos pasos:</p>
            <ol>
                <li>Inicia sesión en tu cuenta de vendedor.</li>
                <li>Ve a la sección de "Pedidos" o "Gestión de Ventas".</li>
                <li>Revisa los pedidos recibidos, prepara los productos y envíalos a los clientes.</li>
                <li>Actualiza el estado del pedido una vez que haya sido enviado.</li>
            </ol>

            <h3>Atención al cliente y soporte</h3>
            <p>Estamos aquí para ayudarte en cada paso del proceso de venta. Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte al vendedor.</p>

            <p class="text-center">Última actualización: {{ date('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection
