<div>
    <x-card cardTitle="Lista Roles ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            @can('Rol crear')
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i
                    class="fas fa-plus-circle"></i> Crear roles</a>
            @endcan
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                @can('Rol editar')
                <th width="6%">PERMISOS</th>
                <th width="6%">EDITAR</th>
                @endcan
                @can('Rol eliminar')
                <th width="6%">BORRAR</th>
                @endcan

            </x-slot>

            @forelse ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    @can('Rol editar')
                    <td>
                        <a href="{{ route('roles.permisos', $role->id) }}" class="btn btn-success btn-sm" title="Permisos">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{$role->id}})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('Rol eliminar')
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$role->id}},
                        eventNombre: 'destroyRole'})" class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    @endcan
                </tr>

            @empty

                <tr class="text-center">
                    <td colspan="5">Sin registros</td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{$roles->links()}}
        </x-slot>

    </x-card>

    <x-modal modalId="modalRole" modalTitle="Roles">
        <form wire:submit={{$Id ==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="name"> Nombre:</label>
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre Rol"
                        id="name">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
            </div>

            <hr>
            <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
        </form>

    </x-modal>
</div>
