<div class="container">
    <link rel="stylesheet" href="{{ asset('css/bootstrap@5.3.2.min.css') }}">
    @include('components.layouts.partials.styles')
    <h1>Carrito de Compra</h1>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-cart-plus"></i> Detalles Venta</h3>
            <div class="card-tools">
                <i class="fas fa-tshirt" title="Número de productos"></i>
                <span class="badge badge-pill bg-purple">cuenta los productos</span>
                <i class="fas fa-shopping-basket ml-2" title="Número de items"></i>
                <span class="badge badge-pill bg-purple">cuenta cantidad de cada uno</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button wire:click="decrementProductoCliente()" class="btn btn-danger btn-xs" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        
                            <tr>
                                <td colspan="6">Sin Registros</td>
                            </tr>
                        
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <h5>Total:</h5>
                            </td>
                            <td>
                                <h5>
                                    <span class="badge badge-pill badge-secondary">total pagar</span>
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
