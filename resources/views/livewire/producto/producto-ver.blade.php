<x-card cardTitle="Detalles Proyecto" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('productos') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{ $producto->imagen }}" class="img-fluid" alt="Product Image">
                </div>                
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 style="text-transform: uppercase; font-weight: bold;">{{$producto->nombre}}</h1>
                        <h6 class="card-subtitle mb-2 text-muted">Descripcion:</h6>
                        <p class="card-text">{{$producto->descripcion}}</p>
                        
                        <div class="d-flex align-items-center mb-2">
                            <h5 style="font-weight: bold; margin: 0;">Categoría:</h5>
                            <p style="margin: 0; margin-left: 10px;">{{$producto->categoria->nombre}}</p>
                        </div>
                
                        <h3 class="text-success" style="font-weight: bold;">{{$producto->precio}} BS.</h3>
                
                        <div class="d-flex align-items-center mb-2">
                            <h5 style="font-weight: bold; margin: 0;">Sede:</h5>
                            <p style="margin: 0; margin-left: 10px;">{{$producto->sede->nombre}}</p>
                        </div>
                
                        <div class="d-flex align-items-center mb-2">
                            <h5 style="font-weight: bold; margin: 0; margin-right: 10px;">Stock:</h5>
                            <p style="margin: 0;">{{$producto->stock}}</p>
                        </div>
                
                        <div class="d-flex align-items-center mb-2">
                            <h5 style="font-weight: bold; margin: 0; margin-right: 10px;">Proyecto:</h5>
                            <p class="text-warning" style="margin: 0; font-weight: bold;">{{$producto->proyecto->nombre}}</p>
                        </div>
                    </div>
                </div>            
                
                <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
                    {{$producto->updated_at}}
                </div>
            </div>
        </div>
    </div>
    

</x-card>
