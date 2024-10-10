<div>
    <x-card cardTitle="Lista Permisos ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            @can('Permiso crear')
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i class="fas fa-plus-circle"></i> Crear permisos</a>
            @endcan
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                @can('Permiso editar')
                <th width="6%">EDITAR</th>
                @endcan
                @can('Permiso eliminar')
                <th width="6%">BORRAR</th>
                @endcan
            </x-slot>

            @forelse ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    @can('Permiso editar')
                    <td>
                        <a href="#" wire:click='edit({{ $permission->id }})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('Permiso eliminar')
                    <td>
                        <a wire:click="$dispatch('delete', {id: {{ $permission->id }}, eventNombre: 'destroyPermission'})" class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    @endcan
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="4">Sin registros</td>
                </tr>
            @endforelse
        </x-table>

        <x-slot:cardFooter>
            {{ $permissions->links() }}
        </x-slot>
    </x-card>

    <x-modal modalId="modalPermission" modalTitle="Permisos">
        <form wire:submit.prevent="{{ $Id == 0 ? 'store' : 'update($Id)' }}">
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="name"> Nombre:</label>
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre Permiso" id="name">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
        </form>
    </x-modal>
</div>
