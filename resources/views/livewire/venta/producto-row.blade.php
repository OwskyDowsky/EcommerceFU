<tr>
    <td>{{$producto->id}}</td>
    <td>
        <x-image :item="$producto" size="35" />

    </td>
    <td>{{$producto->nombre}}</td>
    <td>{{$producto->precio}}</td>
    <td>{{$stock}}</td>
    <td>

    <button
        wire:click="addProducto({{$producto->id}})"
        class="btn btn-primary btn-sm"
        title="Agregar">
        <i class="fas fa-plus-circle"></i>
    </button>
</td>

</tr>