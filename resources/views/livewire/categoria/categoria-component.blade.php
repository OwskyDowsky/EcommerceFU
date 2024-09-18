<div>
    <x-card cardTitle="Lista Categorias ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            @can('Categoria crear')
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i
                    class="fas fa-plus-circle"></i> Crear categorias</a>
            @endcan
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                @can('Categoria baja')
                <th>ESTADO</th>
                @endcan
                <th width="6%">VER</th>
                @can('Categoria editar')
                <th width="6%">EDITAR</th>
                @endcan
                @can('Categoria eliminar')
                <th width="6%">BORRAR</th>
                @endcan

            </x-slot>
            
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    @can('Categoria baja')
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $categoria->id }}" wire:click="toggleEstado({{ $categoria->id }})" {{ $categoria->estado === 'activo' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch{{ $categoria->id }}">{{ $categoria->estado }}</label>
                        </div>
                    </td>
                    @endcan
                    <td>
                        <a href="{{route('categorias.ver', $categoria)}}" class="btn btn-success btn-sm" title="Ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    @can('Categoria editar')
                    <td>
                        <a href="#" wire:click='edit({{$categoria->id}})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('Categoria eliminar')
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$categoria->id}},
                        eventNombre: 'destroyCategoria'})" class="btn btn-danger btn-sm" title="Eliminar">
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
            {{$categorias->links()}}
        </x-slot>

    </x-card>

    <x-modal modalId="modalCategoria" modalTitle="Categorias">
        <form wire:submit={{$Id ==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="nombre"> Nombre:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre Categoria"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="descripcion"> Descripcion:</label>
                    <input wire:model='descripcion' type="text" class="form-control" placeholder="Descripcion de la Categoria"
                        id="descripcion">
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
