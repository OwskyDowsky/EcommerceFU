<div class="container">
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.3.2.min.css') }}">
    @include('components.layouts.partials.styles')
    <h1>Carrito de Compra</h1>
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

    // Función para quitar un producto del carrito
    function quitarDelCarrito(id) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito = carrito.filter(producto => producto.id !== id);

        localStorage.setItem('carrito', JSON.stringify(carrito));
        mostrarCarrito();  // Actualizar la vista del carrito
    }

    // Cargar el carrito cuando la página se cargue
    window.onload = mostrarCarrito;
</script>
