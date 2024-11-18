<div>
    <!-- Filtros -->
    <div class="row mb-4">
        <div class="col-md-6">
            <select wire:model.live="selectedCategoria" class="form-control">
                <option value="">Todas las categorías</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live='search' class="form-control" placeholder="Buscar...">
        </div>
    </div>

    <!-- Lista de productos -->
    <div class="row">
        @forelse ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <div class="text-end">
                            <button wire:click="agregarAlCarrito({{ $producto->id }})" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus-circle"></i> Agregar al carrito
                            </button>
                            <button wire:click="toggleListaDeseos({{ $producto->id }})" class="btn btn-outline-warning btn-sm">
                                <i class="fas fa-star"></i>
                            </button>
                            <a href="{{ route('producto.info', $producto->slug) }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-info"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No se encontraron productos para esta búsqueda o categoría.</p>
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $productos->links() }}
    </div>
</div>



@push('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        // Cargar la lista de deseos desde LocalStorage
        const listaDeseos = JSON.parse(localStorage.getItem('listaDeseos')) || [];
        listaDeseos.forEach(producto => {
            const btn = document.getElementById(`deseo-${producto.id}`);
            if (btn) {
                btn.classList.add('btn-warning');
            }
        });
    });
</script>
@endpush
