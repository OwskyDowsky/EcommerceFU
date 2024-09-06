<div>
    <x-card cardTitle="Lista de productos ({{ $this->totalRegistros }})" cardTools="card tools">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i
                    class="fas fa-plus-circle"></i> Agregar Producto</a>
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th><i class="fas fa-image"></i></th>
                <th>NOMBRE</th>
                <th>SEDE</th>
                <th>PRECIO</th>
                <th>STOCK</th>
                <th>ESTADO</th>
                <th width="6%">VER</th>
                <th width="6%">EDITAR</th>
                <th width="6%">BORRAR</th>

            </x-slot>

            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>
                        <x-image :item="$producto" />
                    </td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->sede->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $producto->id }}" wire:click="toggleEstado({{ $producto->id }})" {{ $producto->estado === 'activo' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch{{ $producto->id }}">{{ $producto->estado }}</label>
                        </div>
                    </td>
                    <td>
                        <a href="{{route('productos.ver', $producto)}}" class="btn btn-success btn-sm" title="Ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{$producto->id}})' class="btn btn-warning btn-sm" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$producto->id}},
                        eventNombre: 'destroyProducto'})" class="btn btn-danger btn-sm" title="Eliminar">
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
                {{$productos->links()}}
        </x-slot>
    </x-card>

    <x-modal modalId="modalProducto" modalTitle="Productos" modalSize="modal-xl">
        <form wire:submit={{$Id ==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group col-4">
                    <label class="fas fa-th" for="nombre"> Nombre del producto:</label>
                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre del proyecto"
                        id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="form-group col-4">
                    <label class="fas fa-th" for="precio"> Precio del producto:</label>
                    <div class="input-group">
                        <input wire:model='precio' type="number" class="form-control" placeholder="Precio del producto" id="precio">
                        <div class="input-group-append">
                            <span class="input-group-text">BS.</span>
                        </div>
                    </div>
                    @error('precio')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>                 

                <div class="form-group col-4">
                    <label class="fas fa-th" for="stock"> Stock del producto:</label>
                    <input wire:model='stock' type="number" class="form-control" placeholder="Stock del producto"
                        id="stock">
                    @error('stock')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label class="fas fa-th" for="descripcion"> Descripcion del producto:</label>
                    <textarea wire:model='descripcion' type="text" class="form-control" placeholder="Descripcion del proyecto"
                        id="descripcion" rows="2">
                    </textarea>
                    @error('descripcion')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label class="fas fa-globe" for="categoria_id"> Categoria:</label>
                    <select wire:model="categoria_id" id="categoria_id" class="form-control">
                        <option value="0">seleccionar</option>
                        @foreach ($this->categorias as $categorias)
                            <option value="{{ $categorias->id }}">{{ $categorias->nombre }}</option>
                        @endforeach
    
                    </select>
                    @error('categoria_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label class="fas fa-globe" for="proyecto_id"> Proyecto:</label>
                    <select wire:model="proyecto_id" id="proyecto_id" class="form-control">
                        <option value="0">Seleccionar</option>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                        @endforeach
                    </select>
                    @error('proyecto_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>                
                <div class="form-group col-md-4">
                    <label class="fas fa-globe" for="sede_id"> Sede:</label>
                    <select wire:model="sede_id" id="sede_id" class="form-control">
                        <option value="0">seleccionar</option>
                        @foreach ($this->sedes as $sedes)
                            <option value="{{ $sedes->id }}">{{ $sedes->nombre }}</option>
                        @endforeach

                    </select>
                    @error('sede_id')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label class="fas fa-image" for="image"> Imagen:</label>
                    <input wire:model='image' type="file" id="image" accept="image/*">

                    @error('image')
                        <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    @if ($Id > 0)
                        <x-image :item="$productos = App\Models\Productos::find($Id)" size="200" float="float-right" />
                    @endif
                    @if ($this->image)
                        <img src="{{ $image->temporaryUrl() }}" class="rounded float-right" width="150">
                    @endif

                </div>
            </div>

            <hr>
            <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
        </form>

    </x-modal>
    
</div>
