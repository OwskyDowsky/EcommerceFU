<div>
    <x-card cardTitle="Lista de clientes ({{ $this->totalRegistros }})">
        <x-slot:cardTools>
            @can('Cliente crear')
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i class="fas fa-plus-circle"></i> Agregar cliente
            </a>
            @endcan
        </x-slot>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>COD</th>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                @can('Cliente baja')
                <th>ESTADO</th>
                @endcan
                @can('Cliente editar')
                <th width="6%">EDITAR</th>
                @endcan
                @can('Cliente eliminar')
                <th width="6%">BORRAR</th>
                @endcan
            </x-slot>

            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->cod_estudiante}}</td>
                    <td>{{ $cliente->ci }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    @can('Cliente baja')
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $cliente->id }}"
                                wire:click="toggleEstado({{ $cliente->id }})"
                                {{ $cliente->estado === 'activo' ? 'checked' : '' }}>
                            <label class="custom-control-label"
                                for="customSwitch{{ $cliente->id }}">{{ $cliente->estado }}</label>
                        </div>
                    </td>
                    @endcan
                    @can('Cliente editar')
                    <td>
                        <a href="#" wire:click='edit({{ $cliente->id }})' class="btn btn-warning btn-sm"
                            title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('Cliente eliminar')
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{ $cliente->id }},
                        eventNombre: 'destroyCliente'})"
                            class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    @endcan
                </tr>

            @empty

                <tr class="text-center">
                    <td colspan="11">Sin registros</td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{ $clientes->links() }}

        </x-slot>
    </x-card>
    @include('cliente.form')

</div>
