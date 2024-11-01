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
                <livewire:venta.producto-row :producto="$producto" :wire:key="$producto->id" >
            @empty
                <tr>
                    <td colspan="10">Sin Registros</td>
                </tr>  
            @endforelse
   
    </x-table>

</div>
<div class="card-footer">
    {{$productos->links()}}
</div>

</div>
