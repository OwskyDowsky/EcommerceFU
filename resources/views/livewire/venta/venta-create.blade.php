<div>
    <x-card cardTitle="Crear venta">
        <x-slot:cardTools>
            <a href="#" class="btn btn-danger" wire:click='clear'>
                <i class="fas fa-trash"></i> Cancelar venta
            </a>
        </x-slot>

        <div class="row">
            {{-- columna de productos --}}
            <div class="col-md-6">
                {{-- cliente --}}
                @livewire('venta.client')
                @include('ventas.lista-productos')
            </div>
            {{-- columna detalles venta --}}
            <div class="col-md-6">
                @include('ventas.card-details')
                {{-- pago --}}
                @include('ventas.card-pago')

            </div>
        </div>

        <x-slot:cardFooter>

        </x-slot>
    </x-card>

</div>
<script>
    function confirm() {
        Swal.fire({
            title: 'confirmar venta',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: "#00bc8c",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'

        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('{{ isset($venta) ? 'editVenta' : 'createVenta' }}');
            }
        });
    }
</script>
