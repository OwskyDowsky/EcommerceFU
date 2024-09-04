<x-card cardTitle="Detalles Categoria" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('categorias') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>
    <div class="col-md-4 col-sm-6 col-md-10 mx-auto">
        <div class="info-box" style="background-color: #3f474e; color: white;"> <!-- Fondo y texto -->
            <span class="info-box-icon" style="color: white;"><i class="far fa-bookmark"></i></span>
            <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold; font-size: 25px; color: white; text-transform: uppercase; font-weight: bold;">{{ $categoria->nombre }}</span>
                <span class="info-box-number" style="color: #6c757d;">{{ $categoria->descripcion }}</span> <!-- Color diferente para la descripción -->
                <!-- Contenedor para alinear en la misma fila -->
                <div class="d-flex align-items-center mb-2">
                    <h5 style="color: white; font-weight: bold;">Productos:</h5>
                    <p style="margin: 0; margin-left: 10px; font-size: 16px;">{{ count($categoria->productos ?? []) }}</p>
                </div>
                <span class="progress-description"></span>
            </div>
        </div>
    </div>
    
</x-card>
