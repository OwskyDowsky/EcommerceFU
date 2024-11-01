<div>
    <x-card cardTitle="Crear venta">
       <x-slot:cardTools>
          <a href="#" class="btn btn-danger" wire:click='clear'>
            <i class="fas fa-trash"></i> Cancelar venta 
          </a>
       </x-slot>

       <div class="row">
         {{--columna de productos--}}
         <div class="col-md-6">
               @include('ventas.lista-productos')
         </div>
         {{--columna detalles venta--}}
         <div class="col-md-6">
               @include('ventas.card-details')
               {{--pago--}}
               @include('ventas.card-pago')
               {{--cliente--}}
               @livewire('venta.client')
         </div>
       </div>
 
       <x-slot:cardFooter>
            
       </x-slot>
    </x-card>

</div>

 