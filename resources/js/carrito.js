// Función para agregar al carrito
function agregarAlCarrito(id, nombre, precio) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    let productoExistente = carrito.find(producto => producto.id === id);
    if (productoExistente) {
        productoExistente.cantidad += 1;
    } else {
        carrito.push({ id: id, nombre: nombre, precio: precio, cantidad: 1 });
    }
    localStorage.setItem('carrito', JSON.stringify(carrito));
    alert('Producto agregado al carrito');
}