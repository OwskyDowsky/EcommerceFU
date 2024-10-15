<?php

namespace App\Livewire\Venta;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Productos;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Crear ventas')]
class VentaCreate extends Component
{
    use WithPagination;
    //propiedades
    public $search='';
    public $cant=5;
    public $totalRegistro=0;
    //
    public $client = 1;
    public $pago;
    public $fecha;


    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistro = Productos::count();
        
        return view('livewire.venta.venta-create',[
            'productos' => $this->productos,
            'cart' => Cart::getCart(),
            'total' => Cart::getTotal(),
            'totalArticulos' => Cart::totalArticulos(),
        ]);
    }
    public function addProducto(Productos $producto){
        //dump($producto);
        Cart::add($producto);
    }

    public function decrement($id){
        Cart::decrement($id);
    }

    #[Computed()]
    public function productos(){
        return Productos::where('nombre','like','%'.$this->search.'%')
            ->orderBy('id','desc')
            ->paginate($this->cant);
    }
    #[On('clientes_id')]
    public function client_id($id = 1)
    {
        $this->client = $id;
    }


}

