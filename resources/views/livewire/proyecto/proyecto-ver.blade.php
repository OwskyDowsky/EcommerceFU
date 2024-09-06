<x-card cardTitle="Detalles Proyecto" cardTools="card tools">
    <x-slot name="cardTools">
        <a href="{{ route('proyectos') }}" class="btn btn-primary">
            <i class="fas fa-long-arrow-alt-left"></i> Regresar
        </a>
    </x-slot>
    <div class="col-md-8 mx-auto">
        <div class="card card-widget widget-user-2 shadow-sm">

            <div class="widget-user-header bg-warning d-flex align-items-center">
                <div class="widget-user-image">
                    <i class="fas fa-project-diagram fa-3x"></i>
                </div>
                <h3 class="widget-user-username" style="margin: 0; text-transform: uppercase; font-weight: bold;">{{$proyecto->nombre}}</h3> <!-- Eliminado margen inferior del encabezado -->
            </div>                      
            <div class="card-footer p-0">
                <ul class="nav flex-column" style="margin-top: 10px; margin-left: 10px">
                    <p>
                        <a style="margin: 0; font-weight: bold;">descripcion:</a>
                        <p>
                            {{$proyecto->descripcion}}
                        </p>
                    </p>
                    <p>
                        <a style="margin: 0; font-weight: bold;">Estado:
                            <span class="badge rounded-pill bg-info" style="font-size: 14px">
                                {{$proyecto->estado}}
                            </span>
                            
                        </a>
                    </p>
                </ul>
            </div>
        </div>
    </div>

    



</x-card>
