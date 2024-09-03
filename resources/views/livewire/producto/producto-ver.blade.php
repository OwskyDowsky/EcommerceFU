<x-card cardTitle="Detalles Proyecto" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('productos') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h2 class="profile-username text-center">{{$producto->nombre }}</h2>
                    <h3 class="profile-username text-center">{{$producto->descripcion}}</h3>
                    <h3 class="profile-username text-center">{{$producto->precio}}</h3>
                    <h3 class="profile-username text-center">{{$producto->categoria_id}}</h3>
                    <h3 class="profile-username text-center">{{$producto->proyecto_id}}</h3>
                    <h3 class="profile-username text-center">{{$producto->stock}}</h3>
                    <h3 class="profile-username text-center">{{$producto->sede_id}}</h3>
                    <h3 class="profile-username text-center">{{$producto->created_at}}</h3>
                </div>

            </div>

        </div>
    </div>

</x-card>
