<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .logo {
            max-width: 150px;
        }
        .details {
            margin-top: 20px;
        }
        .details h2 {
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 40px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Factura de Compra</h1>
        <p>Gracias por tu compra con nosotros.</p>
    </div>
    
    <div class="details">
        <h2>Detalles del Pedido</h2>
        <p><strong>Producto:</strong> {{ $pedido->producto->nombre }}</p>
        <p><strong>Precio Total:</strong> €{{ number_format($pedido->precio_total, 2) }}</p>
        <p><strong>Dirección de Envío:</strong> {{ $pedido->direccion_envio }}</p>
        <p><strong>Método de Pago:</strong> {{ $pedido->estado_pago }}</p>
    </div>
    
    <div class="footer">
        <p>Teléfono: +34 640 88 83 63 | Correo: info@exchange.com</p>
        <p>Visítanos en <a href="http://www.ex-change.com">www.ex-change.com</a></p>
    </div>
</body>
</html>
