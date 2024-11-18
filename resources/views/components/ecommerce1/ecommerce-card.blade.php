<div class="container">
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.3.2.min.css') }}">
    @include('components.layouts.partials.styles')
    <h1>Carrito de Compra</h1>
    <div class="d-flex justify-content-between">
        <a href="{{ route('index') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </div> 
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-cart-plus"></i> Detalles Venta</h3>
            <div class="card-tools">
                <!-- Mostrar el número de productos únicos en el carrito -->
                <i class="fas fa-tshirt" title="Número de productos"></i>
                <span class="badge badge-pill bg-purple" id="numero-productos">0</span>
                <!-- Mostrar la cantidad total de productos en el carrito -->
                <i class="fas fa-shopping-basket ml-2" title="Número de items"></i>
                <span class="badge badge-pill bg-purple" id="cantidad-total">0</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Quitar</th>
                        </tr>
                    </thead>
                    <tbody id="productos-carrito">
                        <!-- Productos cargados dinámicamente -->
                    </tbody>
                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <h5>Total:</h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary" id="total-pagar">0</span>
                            </h5>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="">
                
            </a>
        </div>
    </div>
</div>

<!-- Script para manejar el carrito -->
<script>
    // Función para mostrar el carrito y actualizar el número de productos y la cantidad total
    function mostrarCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        // Actualizar el número de productos únicos en el carrito
        document.getElementById('numero-productos').innerText = carrito.length;

        // Calcular la cantidad total de productos
        let cantidadTotal = carrito.reduce((total, producto) => total + producto.cantidad, 0);
        document.getElementById('cantidad-total').innerText = cantidadTotal;

        // Calcular el total a pagar
        let totalPagar = 0;
        let tablaCarrito = '';

        carrito.forEach((producto, index) => {
            let subTotal = producto.precio * producto.cantidad;
            totalPagar += subTotal;

            tablaCarrito += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${producto.nombre}</td>
                    <td>${producto.precio}</td>
                    <td>${producto.cantidad}</td>
                    <td>${subTotal}</td>
                    <td>
                        <button onclick="quitarDelCarrito(${producto.id})" class="btn btn-danger btn-xs">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        document.getElementById('productos-carrito').innerHTML = tablaCarrito;
        document.getElementById('total-pagar').innerText = totalPagar;

        // Si no hay productos, mostrar un mensaje
        if (carrito.length === 0) {
            document.getElementById('productos-carrito').innerHTML = '<tr><td colspan="6">Sin Registros</td></tr>';
        }
    }

    // Función para quitar o reducir la cantidad de un producto en el carrito
    function quitarDelCarrito(id) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        // Buscar el producto por su ID
        let producto = carrito.find(producto => producto.id === id);

        if (producto) {
            if (producto.cantidad > 1) {
                // Si la cantidad es mayor que 1, reduce la cantidad en 1
                producto.cantidad -= 1;
            } else {
                // Si la cantidad es 1, eliminar el producto del carrito
                carrito = carrito.filter(producto => producto.id !== id);
            }

            // Actualizar el carrito en el localStorage
            localStorage.setItem('carrito', JSON.stringify(carrito));

            // Mostrar el carrito actualizado
            mostrarCarrito();
        }
    }

    // Cargar el carrito cuando la página se cargue
    window.onload = mostrarCarrito;
</script>
