<div class="container">
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.3.2.min.css') }}">
    @include('components.layouts.partials.styles')
    @include('components.layouts.partials.scripts')
    <h1>Lista de Deseos</h1>
    <div class="d-flex justify-content-between">
        <a href="{{ route('index') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
        <a href="{{ route('carrito') }}" class="btn btn-primary ms-3">
            <i class="fas fa-long-arrow-alt-right"></i> Ir al carrito
        </a>
    </div> 
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-star"></i> Productos deseados</h3>
        </div>
        <div class="card-body">           
            
            <div id="lista-deseos" class="row">
                <!-- Los productos deseados serán renderizados aquí -->
            </div>
        </div>
    </div>
</div>

<!-- Script para renderizar la lista de deseos -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener la lista de deseos de LocalStorage
        let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];

        // Elemento donde se mostrarán los productos deseados
        let contenedorListaDeseos = document.getElementById('lista-deseos');

        // Si no hay productos en la lista de deseos
        if (listaDeseos.length === 0) {
            contenedorListaDeseos.innerHTML = "<p>No hay productos en tu lista de deseos.</p>";
        } else {
            // Renderizar los productos en la lista de deseos
            listaDeseos.forEach(producto => {
                let card = `
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${producto.imagen}" alt="${producto.nombre}">
                        <div class="card-body">
                            <h5 class="card-title">${producto.nombre}</h5>
                            <p class="card-text">Precio: $${producto.precio}</p>

                            <!-- Botón de agregar al carrito -->
                            <button onclick="agregarAlCarrito(${producto.id}, '${producto.nombre}', ${producto.precio})" class="btn btn-primary btn-sm">Agregar al carrito</button>

                            <!-- Botón de eliminar de la lista de deseos -->
                            <button onclick="eliminarDeListaDeseos(${producto.id})" class="btn btn-danger btn-sm">Eliminar</button>
                        </div>
                    </div>
                </div>
                `;
                contenedorListaDeseos.innerHTML += card;
            });
        }
    });

    // Función para eliminar un producto de la lista de deseos
    function eliminarDeListaDeseos(id) {
        let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
        listaDeseos = listaDeseos.filter(producto => producto.id !== id);
        localStorage.setItem('listaDeseos', JSON.stringify(listaDeseos));
        Swal.fire({
            icon: "success",
            title: "Producto eliminado de la lista de deseos",
            showConfirmButton: false,
            timer: 1000
        }).then(() => {
            location.reload(); // Recargar la página después de agregar al carrito y eliminar de lista de deseos
        });
    }

    // Función para agregar al carrito
    function agregarAlCarrito(id, nombre, precio, imagen) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let productoExistente = carrito.find(producto => producto.id === id);

        if (productoExistente) {
            productoExistente.cantidad += 1;
        } else {
            carrito.push({ id: id, nombre: nombre, precio: precio, cantidad: 1, imagen: imagen });
        }
        
        // Actualizar el carrito en LocalStorage
        localStorage.setItem('carrito', JSON.stringify(carrito));

        // Eliminar el producto de la lista de deseos
        let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
        listaDeseos = listaDeseos.filter(producto => producto.id !== id);
        localStorage.setItem('listaDeseos', JSON.stringify(listaDeseos));

        // Mostrar SweetAlert y recargar la página
        Swal.fire({
            icon: "success",
            title: "Producto agregado al carrito",
            showConfirmButton: false,
            timer: 1000
        }).then(() => {
            location.reload(); // Recargar la página después de agregar al carrito y eliminar de lista de deseos
        });
    }
</script>
