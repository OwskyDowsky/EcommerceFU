<div>
    <x-card cardTitle="Lista de Sedes ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            @can('Sede crear')
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i
                    class="fas fa-plus-circle"></i> Agregar una sede</a>
            @endcan
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>UBICACION</th>
                @can('Sede editar')
                <th width="6%">EDITAR</th>
                @endcan
                @can('Sede eliminar')
                <th width="6%">BORRAR</th>
                @endcan

            </x-slot>

            @forelse ($sedes as $sede)
                <tr>
                    <td>{{ $sede->id }}</td>
                    <td>{{ $sede->nombre }}</td>
                    <td>{{ $sede->ubicacion }}</td>
                    @can('Sede editar')
                    <td>
                        <a href="#" wire:click='edit({{$sede->id}})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('Sede eliminar')
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$sede->id}},
                        eventNombre: 'destroySede'})" class="btn btn-danger btn-sm" title="Eliminar">
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
                {{$sedes->links()}}
        </x-slot>
    </x-card>

    <x-modal modalId="modalSede" modalTitle="Sedes">
        <form wire:submit={{$Id ==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="nombre"> Nombre de la sede:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre de la sede"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="ubicacion"> Ubicacion de la sede:</label>
                    <input wire:model='ubicacion' type="text" class="form-control" placeholder="ubicacion de la sede"
                        id="ubicacion">
                    @error('ubicacion')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr>
            <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
        </form>

    </x-modal>
</div>
