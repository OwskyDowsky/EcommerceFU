<div class="container mt-4">
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.3.2.min.css') }}">
    @include('components.layouts.partials.styles')
    @include('components.layouts.partials.scripts')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $producto->imagen }}" class="img-fluid" alt="{{ $producto->nombre }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $producto->nombre }}</h1>
            <p>{{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio }} USD</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
            <!-- Botón para agregar al carrito -->
            <button onclick="agregarAlCarrito({{ $producto->id }}, '{{ $producto->nombre }}', {{ $producto->precio }})" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Agregar al carrito
            </button>
        </div>
    </div>
</div>
<script>
    function agregarAlCarrito(id, nombre, precio) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let productoExistente = carrito.find(producto => producto.id === id);
        if (productoExistente) {
            productoExistente.cantidad += 1;
        } else {
            carrito.push({ id: id, nombre: nombre, precio: precio, cantidad: 1 });
        }
        localStorage.setItem('carrito', JSON.stringify(carrito));
        Swal.fire({
            icon: "success",
            title: "Producto agregado al carrito",
            showConfirmButton: false,
            timer: 1000
            });
    }
</script>