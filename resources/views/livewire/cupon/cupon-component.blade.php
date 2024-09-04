<div>
    <x-card cardTitle="Lista de cupones ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i
                    class="fas fa-plus-circle"></i> Crear un cupon</a>
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCUENTO</th>
                <th>CATEGORIA</th>
                <th>PRODUCTO</th>
                <th>FECHA DE CREACION</th>
                <th>fECHA DE VENCIMIENTO</th>
                <th>ESTADO</th>
                <th width="6%">VER</th>
                <th width="6%">EDITAR</th>
                <th width="6%">BORRAR</th>

            </x-slot>

            @forelse ($cupones as $cupon)
                <tr>
                    <td>{{ $cupon->id }}</td>
                    <td>{{ $cupon->nombre }}</td>
                    <td>{{ $cupon->descuento }} %</td>
                    <td>{{ optional($cupon->categoria)->nombre }}</td>
                    <td>{{ optional($cupon->producto)->nombre }}</td>
                    <td>{{ $cupon->created_at }}</td>
                    <td>{{ $cupon->fecha_vencimiento }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $cupon->id }}" wire:click="toggleEstado({{ $cupon->id }})" {{ $cupon->estado === 'activo' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch{{ $cupon->id }}">{{ $cupon->estado }}</label>
                        </div>
                    </td>
                    <td>
                        {{--<a href="{{route('productos.ver', $producto)}}" class="btn btn-success btn-sm" title="Ver">
                            <i class="far fa-eye"></i>
                        </a>--}}
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{$cupon->id}})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$cupon->id}},
                        eventNombre: 'destroyCupon'})" class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="8">Sin registros</td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
                {{$cupones->links()}}
        </x-slot>
    </x-card>

    <x-modal modalId="modalCupon" modalTitle="Cupones">
        <form wire:submit={{$Id ==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="fas fa-th" for="nombre"> Nombre del cupon:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre del cupon"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="descuento"> Descuento del cupon:</label>
                    <select wire:model="descuento" id="descuento" class="form-control">
                        <option value="0">seleccionar</option>
                        <option value="10">10%</option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="fecha_vencimiento"> Fecha de vencimiento del cupon:</label>
                    <input wire:model='fecha_vencimiento' type="date" class="form-control" placeholder="fecha de vencimiento del cupon"
                        id="fecha_vencimiento">
                    @error('fecha_vencimiento')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label class="fas fa-globe" for="categoria_id"> Categoria del cupon:</label>
                    <select wire:model="categoria_id" id="categoria_id" class="form-control">
                        <option value="0">seleccionar</option>
                        @foreach ($this->categorias as $categorias)
                            <option value="{{ $categorias->id }}">{{ $categorias->nombre}}</option>
                        @endforeach
    
                    </select>
                    @error('categoria_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label class="fas fa-globe" for="producto_id"> Producto del cupon:</label>
                    <select wire:model="producto_id" id="producto_id" class="form-control">
                        <option value="0">seleccionar</option>
                        @foreach ($this->productos as $productos)
                            <option value="{{ $productos->id }}">{{ $productos->nombre }}</option>
                        @endforeach
    
                    </select>
                    @error('producto_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr>
            <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
        </form>

    </x-modal>
</div>
