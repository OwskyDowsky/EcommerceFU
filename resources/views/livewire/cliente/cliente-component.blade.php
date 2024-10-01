<div>
    <x-card cardTitle="Lista de clientes ({{ $this->totalRegistros }})">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i class="fas fa-plus-circle"></i> Agregar cliente
            </a>
        </x-slot>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>COD</th>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>ESTADO</th>
                <th width="6%">EDITAR</th>
                <th width="6%">BORRAR</th>

            </x-slot>

            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->cod_estudiante}}</td>
                    <td>{{ $cliente->ci }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $cliente->id }}"
                                wire:click="toggleEstado({{ $cliente->id }})"
                                {{ $cliente->estado === 'activo' ? 'checked' : '' }}>
                            <label class="custom-control-label"
                                for="customSwitch{{ $cliente->id }}">{{ $cliente->estado }}</label>
                        </div>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{ $cliente->id }})' class="btn btn-warning btn-sm"
                            title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{ $cliente->id }},
                        eventNombre: 'destroyCliente'})"
                            class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
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


    <x-modal modalId="modalCliente" modalTitle="Usuarios" modalSize="modal-lg">
        <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
            <div class="form-row">
                {{-- nombre --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-file-signature" for="nombre"> Nombre:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre del cliente"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- apellido paterno --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-file-signature" for="apellido"> Apellido Paterno:</label>
                    <input wire:model='apellido' type="text" class="form-control"
                        placeholder="Apellido del cliente" id="apellido">
                    @error('apellido')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- cod estudiante --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-calendar-day" for="cod_estudiante"> CODIGO ESTUDIANTIL:</label>
                    <input wire:model='cod_estudiante' type="text" class="form-control" placeholder="codigo estudiantil" id="cod_estudiante">
                    @error('cod_estudiante')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- ci --}}
                <div class="form-group col-md-4">
                    <label class="fas fa-calendar-day" for="ci"> CI:</label>
                    <input wire:model='ci' type="number" class="form-control" placeholder="ci" id="ci">
                    @error('ci')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
        </form>
    </x-modal>

</div>
