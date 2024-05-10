@extends('layouts.app')

@section('content')
<head>
    <!-- Incluye la biblioteca Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<div class="container py-5">
    <!-- Cabecera con Detalles del Producto -->
    <h1>Detalles del Producto</h1>
    
    <div class="table-container">
        <table class="table">
            <tr>
                <th>Producto</th>
                <td>{{ $producto->nombre }}</td>
            </tr>
            <tr>
                <th>Precio</th>
                <td id="precio_unitario">{{ $producto->precio_unitario }}€</td>
            </tr>
        </table>
    </div>

    <hr>

    <!-- Información de Envío y Pago -->
    <h2>Información de Envío y Pago</h2>
    <form action="{{ route('processPurchase', ['id' => $producto->id]) }}" method="post">
        @csrf
        <!-- Método de Envío -->
        <div class="form-group mb-4">
            <label for="tipo_envio" class="form-label">Método de envío</label>
            <select id="tipo_envio" class="form-select" name="tipo_envio" required onchange="updateTotal()">
                <option value="Estándar">Estándar - 1,50 €</option>
                <option value="Express">Express - 3,50 €</option>
                <option value="Recogida en tienda">Recogida en tienda - Gratis</option>
            </select>
        </div>
        
        <!-- Empresa de Paquetería -->
    <div class="form-group mb-4">
        <label class="form-label">Empresa de paquetería</label>
        <div class="shipping-options">
            <!-- Opción con Logo de UPS -->
            <div class="shipping-option">
                <input type="checkbox" id="UPS Access Point" name="empresa_paqueteria" value="UPS Access Point">
                <label for="UPS Access Point">
                    <img src="https://about.ups.com/content/dam/upsstories/images/logo/ups-logo-wo-text.svg" alt="UPS">
                </label>
            </div>
            <!-- Opción con Logo de InPost -->
            <div class="shipping-option">
                <input type="checkbox" id="InPost" name="empresa_paqueteria" value="InPost">
                <label for="InPost">
                    <img src="https://www.inpost.es/media/123493/inpostheader.svg" alt="InPost">
                    InPost
                </label>
            </div>
            <!-- Otras opciones con diferentes logos -->
            <div class="shipping-option">
                <input type="checkbox" id="Correos" name="empresa_paqueteria" value="Correos">
                <label for="Correos">
                    <img src="../imgs/LogoCornamusa.svg" alt="Correos">
                    Correos
                </label>
            </div>
            <div class="shipping-option">
                <input type="checkbox" id="SEUR" name="empresa_paqueteria" value="SEUR">
                <label for="SEUR">
                    <img src="https://www.seur.com/images/logo.png" alt="SEUR">
                </label>
            </div>
            <div class="shipping-option">
                <input type="checkbox" id="DHL" name="empresa_paqueteria" value="DHL">
                <label for="DHL">
                    <img src="https://www.dhl.com/content/dam/dhl/global/core/images/logos/dhl-logo.svg" alt="DHL">
                    
                </label>
            </div>
            <div class="shipping-option">
                <input type="checkbox" id="GSL" name="empresa_paqueteria" value="GSL">
                <label for="GSL">
                    <img src="https://storage.googleapis.com/wp-es-pro-media/2021/10/logo-glswhite.png" alt="DHL" style="background-color: blue">
                    
                </label>
            </div>
        </div>
    </div>
        
        <!-- Método de Pago -->
        <div class="form-group mb-4">
            <label for="estado" class="form-label">Método de pago</label>
            <select id="estado" class="form-select" name="estado" required>
                <option value="Tarjeta Bancaria">Tarjeta Bancaria</option>
                <option value="Apple Pay">Apple Pay</option>
                <option value="Google Pay">Google Pay</option>
            </select>
        </div>
        
        <!-- Zona de Entrega -->
        <div class="form-group mb-4">
            <label for="zona_entrega" class="form-label">Zona de entrega</label>
            <input type="text" id="zona_entrega" name="zona_entrega" class="form-control" placeholder="Calle, número, piso, ciudad, pais">
             <!-- Div donde se mostrará el mapa -->
            <div id="mapa-ubicacion" style="height: 300px;"></div>
        </div>

        <!-- Total del Pedido -->
        <div class="form-group mb-4">
            <h3>Total del Pedido: <span id="total-pedido">{{ $producto->precio_unitario }}</span> €</h3>
        </div>
         <!-- Entrega Estimada -->
         <div class="form-group mb-4">
            <h4>Entrega estimada: <span id="entrega-estimada">Desconocida</span></h4>
        </div>
        <!-- Botón de Confirmación -->
        <button type="submit" class="btn btn-primary">Confirmar Compra</button>
    </form>
</div>
<!--Cálculo de envío-->
<script>
function updateInfo() {
    const precioUnitario = parseFloat({{ $producto->precio_unitario }}); // Aseguramos el formato de la variable
    const tipoEnvio = document.getElementById('tipo_envio').value;

    let costoEnvio = 0;
    let entregaEstimada = '';

    // Comprobamos el tipo de envío
    if (tipoEnvio === "Estándar") {
        costoEnvio = 1.50; // Precio para envío estándar
        entregaEstimada = "5-7 días";
    } else if (tipoEnvio === "Express") {
        costoEnvio = 3.50; // Precio para envío exprés
        entregaEstimada = "1-3 días";
    } else if (tipoEnvio === "Recogida en tienda") {
        costoEnvio = 0; // Gratis para recogida en tienda
        entregaEstimada = "1 semana";
    }

    const total = precioUnitario + costoEnvio;
    document.getElementById('total-pedido').textContent = total.toFixed(2); // Actualiza el total
    document.getElementById('entrega-estimada').textContent = entregaEstimada; // Actualiza la estimación de entrega
}

// Actualizar información cada vez que se cambia el método de envío
document.getElementById('tipo_envio').addEventListener('change', updateInfo);

// Inicializar información al cargar la página
document.addEventListener('DOMContentLoaded', updateInfo);
</script>




<!--Mapa-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mapa = L.map('mapa-ubicacion').setView([40.4168, -3.7038], 13); // Madrid, España, como posición inicial

        // Agregar la capa base de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(mapa);

        // Crear un marcador
        const marcador = L.marker([40.4168, -3.7038]).addTo(mapa);

        // Función para geocodificar y centrar el mapa
        function geocodeAndCenter(address) {
            const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const location = data[0];
                        const lat = parseFloat(location.lat);
                        const lon = parseFloat(location.lon);

                        // Centrar el mapa y mover el marcador
                        mapa.setView([lat, lon], 13);
                        marcador.setLatLng([lat, lon]);
                    } else {
                        console.warn("Dirección no encontrada");
                    }
                })
                .catch(error => console.error("Error geocodificando:", error));
        }

        // Evento para actualizar el mapa cuando se cambia la dirección
        document.getElementById('zona_entrega').addEventListener('change', function() {
            const address = this.value;
            geocodeAndCenter(address);
        });
    });
</script>
@endsection

