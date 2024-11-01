document.addEventListener('DOMContentLoaded', function() {
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

    // Función para manejar la lista de deseos
    function toggleListaDeseos(id, nombre) {
        let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
        let productoExistente = listaDeseos.find(producto => producto.id === id);
        let btn = document.getElementById(`deseo-${id}`);

        if (productoExistente) {
            listaDeseos = listaDeseos.filter(producto => producto.id !== id);
            btn.classList.remove('btn-warning');
            btn.classList.add('btn-outline-warning');
        } else {
            listaDeseos.push({ id: id, nombre: nombre });
            btn.classList.remove('btn-outline-warning');
            btn.classList.add('btn-warning');
        }

        localStorage.setItem('listaDeseos', JSON.stringify(listaDeseos));
    }

    // Al cargar la página, marcar los productos que ya están en la lista de deseos
    let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
    listaDeseos.forEach(producto => {
        let btn = document.getElementById(`deseo-${producto.id}`);
        if (btn) {
            btn.classList.remove('btn-outline-warning');
            btn.classList.add('btn-warning');
        }
    });

    // Asignar funciones a botones
    window.agregarAlCarrito = agregarAlCarrito;
    window.toggleListaDeseos = toggleListaDeseos;
});
