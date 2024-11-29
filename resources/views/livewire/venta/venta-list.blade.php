<div>
    <x-card cardTitle="Listado ventas ({{ $this->totalRegistros }})">
        <x-slot:cardTools>
            <a href="{{ route('ventas.create') }}" class="btn btn-primary rounded-btn">
                <i class="fas fa-cart-plus"></i> Crear venta
            </a>
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>PRODUCTOS</th>
                <th>TOTAL</th>
                <th>CUPON</th>
                <th>FECHA EMISION</th>
                <th>FECHA ANULACION</th>
                <th>ESTADO</th>
                <th width="6%">PDF</th>
                <th width="6%">ANULAR</th>
            </x-slot>

            @forelse ($ventas as $venta)
                <tr>
                    <td>
                        FV-{{ $venta->id }}
                    </td>
                    <td>
                        {{ $venta->clientes->nombre }} {{ $venta->clientes->apellido }}
                        {{ $venta->clientes->cod_estudiante }}
                    </td>
                    <td>
                        {{ $venta->items->count() }}
                    </td>
                    <td>
                        {{ $venta->total }}
                    </td>
                    <td>
                        {{ $venta->cupones->nombre ?? 'sin cupon activado' }}
                    </td>
                    <td>
                        {{ $venta->fecha }}
                    </td>
                    <td>
                        {{ $venta->fecha_anulacion ?? 'sin fecha anulacion' }}
                    </td>
                    <td>
                        {{ $venta->estado }}
                    </td>
                    <td>
                        <a href="{{ route('ventas.invoice', $venta) }}" class="btn btn-primary btn-sm" title="PDF"
                            target="_blank">
                            <i class="far fa-file-pdf"></i>
                        </a>
                    </td>
                    {{-- <td>
                        <a 
                            wire:click="$dispatch('anularVentas', {id: {{$venta->id}}, eventNombre: 'anularVentas'})" 
                            class="btn btn-sm {{ $venta->estado === 'inusable' ? 'btn-secondary disabled' : 'btn-danger' }}" 
                            title="Anular"
                            style="{{ $venta->estado === 'inusable' ? 'pointer-events: none; opacity: 0.65;' : '' }}">
                            <i class="fas fa-minus-circle"></i>
                        </a>
                    </td> --}}
                    <td>
                        @if ($venta->estado !== 'anulado')
                            <a href="javascript:void(0);" onclick="confirmAnularVenta({{ $venta->id }})"
                                class="btn btn-danger btn-sm" title="Anular">
                                <i class="fas fa-minus-circle"></i>
                            </a>
                        @else
                            <span></span>
                        @endif
                    </td>

                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="11">Sin registros</td>
                </tr>
            @endforelse

        </x-table>
        <x-slot:cardFooter>
            {{ $ventas->links() }}

        </x-slot>

    </x-card>

</div>
<script>
    function confirmAnularVenta(ventaId) {
        Swal.fire({
            title: '¿Estás seguro de anular esta venta?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: 'Sí, anular',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Llamar al evento Livewire para anular la venta
                @this.call('anular', ventaId);
            }
        });
    }
</script>
