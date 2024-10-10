<div>
    <h1>carrito de compra</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-tshirt"></i> Productos</h3>
                </div>
            
                <div class="card-body">
            
                    <x-table>
            
                        <x-slot:thead>
                            <th scope="col">#</th>
                            <td scope="col">Img</td>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio.vt</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Agregar</th>
            
                        </x-slot>
                        
                        @forelse ($productos as $producto)
                            
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td>
                                <x-image :item="$producto" size="35" />
            
                            </td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>{{$producto->stock}}</td>
                            <td>
            
                            <button
                                wire:click="addProducto({{$producto->id}})"
                                class="btn btn-primary btn-sm"
                                title="Agregar">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </td>
            
                    </tr>
                    @empty
                        <tr>
                            <td colspan="10">Sin Registros</td>
                        </tr>  
                    @endforelse
               
                </x-table>
            
            </div>
            <div class="card-footer">
                
            </div>
            
            </div>
            

        </div>
        <div class="col-md-6">
                
        </div>

    </div>
</div>