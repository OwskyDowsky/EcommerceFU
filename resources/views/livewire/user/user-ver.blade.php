<x-card cardTitle="Detalles del usuario" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('categorias') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>
    <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card card-widget widget-user-2">

                <div class="widget-user-header bg-warning">
                    <div class="widget-user-image">
                        <x-image :item="$user" />
                    </div>

                    <h3 class="widget-user-username" style="font-weight: bold">
                        {{ $user->name }} {{ $user->apellido_paterno }}
                    </h3>
                    <h5 class="widget-user-desc">cargo-rol</h5>
                </div>
                <div class="card-footer bg-dark text-light border-top p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-1">
                            <a href="#" class="text-light">
                                <strong>Email:</strong> {{ $user->email }}
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="text-light">
                                <strong>Estado:</strong> {{ $user->estado }}
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="text-light">
                                <strong>Ci:</strong> {{ $user->ci }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <h5 class="mb-1">Usuario agregado</h5>
                            <p class="text-muted mb-0">{{ $user->created_at->format('d M Y, H:i') }}</p>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

    </div>
</x-card>
