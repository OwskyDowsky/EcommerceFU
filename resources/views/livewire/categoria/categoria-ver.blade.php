<x-card cardTitle="Detalles Categoria" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('categorias') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile" style="background: linear-gradient(to bottom, #36024a, #751597);">
                    <h2 class="profile-username text-center">{{ $categoria->nombre }}</h2>
                    <h3 class="profile-username text-center">{{$categoria->descripcion}}</h3>

                </div>

            </div>

        </div>
    </div>

</x-card>
