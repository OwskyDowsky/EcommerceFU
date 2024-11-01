<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar con Carrito</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.3.2.min.css') }}">
    @include('components.layouts.partials.styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ECommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrito') }}">
                            <i class="fas fa-shopping-cart"></i> Carrito
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wishlist') }}">
                            <i class="fas fa-clipboard-list"></i> Lista de deseos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor de tarjetas -->
    <div class="container mt-4">
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p>{{ $producto->id }}</p>
                            <div class="text-end">
                                <!-- Botón para agregar al carrito -->
                                <button onclick="agregarAlCarrito({{ $producto->id }}, '{{ $producto->nombre }}', {{ $producto->precio }})" class="btn btn-primary btn-sm" title="Agregar al carrito">
                                    <i class="fas fa-plus-circle"></i> agregar al carrito
                                </button>

                                <!-- Ícono de estrella para agregar a la lista de deseos -->
                                <button onclick="toggleListaDeseos({{ $producto->id }}, '{{ $producto->nombre }}', '{{ $producto->precio }}', '{{ $producto->imagen }}')" class="btn btn-outline-warning btn-sm" title="Agregar a lista de deseos" id="deseo-{{ $producto->id }}">
                                    <i class="fas fa-star"></i>
                                </button>
                                <!-- Botón de información -->
                                <a href="{{ route('producto.info', $producto->slug) }}" class="btn btn-outline-info btn-sm" title="Información">
                                    <i class="fas fa-info"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
            alert('Producto agregado al carrito');
        }

        function toggleListaDeseos(id, nombre, precio, imagen) {
            let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
            let productoExistente = listaDeseos.find(producto => producto.id === id);
            let btn = document.getElementById(`deseo-${id}`);

            if (productoExistente) {
                // Si el producto ya está en la lista de deseos, lo quitamos
                listaDeseos = listaDeseos.filter(producto => producto.id !== id);
                btn.classList.remove('btn-warning');
                btn.classList.add('btn-outline-warning');
            } else {
                // Si no está, lo agregamos con precio, imagen y cantidad
                listaDeseos.push({ id: id, nombre: nombre, precio: precio, imagen: imagen, cantidad: 1 });
                btn.classList.remove('btn-outline-warning');
                btn.classList.add('btn-warning');
            }

            localStorage.setItem('listaDeseos', JSON.stringify(listaDeseos));
        }

        // Al cargar la página, marcar los productos que ya están en la lista de deseos
        window.onload = function() {
            let listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
            listaDeseos.forEach(producto => {
                let btn = document.getElementById(`deseo-${producto.id}`);
                if (btn) {
                    btn.classList.remove('btn-outline-warning');
                    btn.classList.add('btn-warning');
                }
            });
        }
    </script>
</body>
</html>
