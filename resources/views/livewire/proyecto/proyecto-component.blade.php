<div>
    <x-card cardTitle="Lista de proyectos ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            @can('Proyecto crear')
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i
                    class="fas fa-plus-circle"></i> Agregar Nuevo</a>
            @endcan
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                @can('Proyecto baja')
                <th>ESTADO</th>
                @endcan
                <th width="6%">VER</th>
                @can('Proyecto editar')
                <th width="6%">EDITAR</th>
                @endcan
                @can('Proyecto eliminar')
                <th width="6%">BORRAR</th>
                @endcan

            </x-slot>

            @forelse ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ $proyecto->descripcion }}</td>
                    @can('Proyecto baja')
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $proyecto->id }}" wire:click="toggleEstado({{ $proyecto->id }})" {{ $proyecto->estado === 'activo' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch{{ $proyecto->id }}">{{ $proyecto->estado }}</label>
                        </div>
                    </td>
                    @endcan
                    <td>
                        <a href="{{route('proyectos.ver', $proyecto)}}" class="btn btn-success btn-sm" title="Ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @can('Proyecto editar')
                    <td>
                        <a href="#" wire:click='edit({{$proyecto->id}})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('Proyecto eliminar')
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$proyecto->id}},
                        eventNombre: 'destroyProyecto'})" class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    @endcan
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="8">Sin registros</td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
                {{$proyectos->links()}}
        </x-slot>
    </x-card>

    <x-modal modalId="modalProyecto" modalTitle="Proyectos">
        <form wire:submit={{$Id ==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="nombre"> Nombre del proyecto:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre del proyecto"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="descripcion"> Descripcion del proyecto:</label>
                    <textarea wire:model='descripcion' type="text" class="form-control" placeholder="Descripcion del proyecto"
                        id="descripcion" rows="4">
                    </textarea>
                    @error('descripcion')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr>
            <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
        </form>

    </x-modal>
</div>
