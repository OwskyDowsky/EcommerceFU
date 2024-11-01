<div class="container mt-4">
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