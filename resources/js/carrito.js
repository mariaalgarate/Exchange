// Asegúrate de que el array carrito esté declarado
let carrito = [];

// Agrega el evento al cargar el DOM
document.addEventListener('DOMContentLoaded', function () {
    const botonAnadirAlCarrito = document.querySelector('.btn-anadir-carrito');
    const carritoIcono = document.getElementById('fas fa-shopping-cart');

    // Evento al pasar el ratón por encima del icono del carrito
    carritoIcono.addEventListener('mouseover', () => {
        mostrarCarrito();
    });

    // Evento al quitar el ratón del icono del carrito
    carritoIcono.addEventListener('mouseout', () => {
        ocultarCarrito();
    });

    botonAnadirAlCarrito.addEventListener('click', () => {
        const nombreProducto = document.querySelector('.titulo-producto h2').textContent;
        const precioProducto = parseFloat(document.querySelector('.precio-producto').textContent.replace('Precio: ', '').replace('€', ''));

        // Añadir producto al carrito
        const producto = { nombre: nombreProducto, precio: precioProducto };
        carrito.push(producto);
        actualizarCarrito();
        mostrarCarrito();
    });
});

// Función para actualizar el carrito
function actualizarCarrito() {
    const carritoLista = document.getElementById('carrito-lista');
    const carritoTotal = document.getElementById('carrito-total');
    const carritoNumero = document.getElementById('carrito-numero');

    // Limpiar lista de carrito
    carritoLista.innerHTML = '';

    // Actualizar lista de carrito
    carrito.forEach(producto => {
        const listItem = document.createElement('li');
        listItem.textContent = `${producto.nombre} - €${producto.precio.toFixed(2)}`;
        carritoLista.appendChild(listItem);
    });

    // Actualizar número en el icono del carrito
    carritoNumero.textContent = carrito.length;

    // Actualizar total
    const total = carrito.reduce((sum, producto) => sum + producto.precio, 0);
    carritoTotal.textContent = `Total: €${total.toFixed(2)}`;
}

// Funciones para mostrar y ocultar el desplegable del carrito
function mostrarCarrito() {
    const carritoPopup = document.getElementById('carrito-popup');
    carritoPopup.style.display = 'block';
}

function ocultarCarrito() {
    const carritoPopup = document.getElementById('carrito-popup');
    carritoPopup.style.display = 'none';
}
