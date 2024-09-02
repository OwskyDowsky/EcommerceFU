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

                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Tours</b> <a class="float-right">{{count($categoria->tours)}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Ventas</b> <a class="float-right">0</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
        <div class="col-md-8">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Tour</th>
                        <th>Agencia</th>
                        <th>Precio Neto</th>
                        <th>Precio Venta</th>
                    </tr>
                </thead>
                @foreach ($categoria->tours as $tours)
                    <tr>
                        <th>{{ $tours->id }}</th>
                        <th>
                            <x-image :item="$tours" />
                        </th>
                        <th>{{ $tours->nombre }}</th>
                        <th>{{ $tours->agencias->nombre}}</th>
                        <th>{{ $tours->precio_neto }}</th>
                        <th>{{ $tours->precio_venta }}</th>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

</x-card>
