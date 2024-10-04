<x-card cardTitle="Detalle Actividad" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('logs') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="row g-0">            
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 style="font-weight: bold;">{{$log->description}}</h1>
                        <h6 class="card-subtitle mb-2 text-muted">Modulo:</h6>
                        <p class="card-text">{{$log->log_name}}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Evento:</h6>
                        <p class="card-text">{{$log->event}}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Usuario:</h6>
                        <p class="card-text">{{ optional($log->causer)->name }} {{ optional($log->causer)->apellido_paterno ?? 'Sistema' }}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Propiedades:</h6>
                        @php
                            $properties = json_decode($log->properties, true);
                        @endphp

                        @if(!empty($properties))
                            <ul class="list-group">
                                @foreach($properties as $key => $value)
                                    <li class="list-group-item">
                                        <strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="card-text">No hay propiedades registradas.</p>
                        @endif

                    </div>
                </div>            
                

            </div>
        </div>
    </div>
    

</x-card>
