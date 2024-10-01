<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-cart-plus"></i> Detalles venta </h3>
        <div class="card-tools">
            <!-- Conteo de productos -->
            <i class="fas fa-tshirt" title="Numero productos"></i>
            <span class="badge badge-pill bg-purple">0 </span>
            <!-- Conteo de articulos -->
            <i class="fas fa-shopping-basket ml-2" title="Numero items"></i>
            <span class="badge badge-pill bg-purple">0 </span>
        </div>
    </div>
<!-- card-body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio.vt</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Sub total</th>
                        <th scope="col">Quitar</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse ($cart as $producto )
                   
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->name}}</td>
                        <td>{{$producto->price}}</td>
                        <td>{{$producto->quantity}}</td>
                        <td>{{$producto->quantity*$producto->price}}</td>
                        <td>
                            <!-- Boton para eliminar el producto del carrito -->
                            <button wire:click="decrement({{$producto->id}})" class="btn btn-danger btn-xs" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">Sin Registros</td>
                    </tr>      
                    @endforelse

                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <h5>Total:</h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    {{($total)}}
                                </span>
                            </h5>
                        </td>
                        <td></td>
                    </tr>
                    <tr>

                        <td colspan="7">
                            <strong>Total en letras:</strong>
                            0
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
<!-- end-card-body -->
</div>