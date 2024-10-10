<?php

namespace App\Livewire\Venta;

use App\Models\Cart;
use App\Models\Productos;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Crear ventas')]
class VentaCreate extends Component
{
    use WithPagination;
    //propiedades
    public $search='';
    public $cant=5;
    public $totalRegistro=0;

    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistro = Productos::count();
        
        return view('livewire.venta.venta-create',[
            'productos' => $this->productos,
            'cart' => Cart::getCart(),
            'total' => Cart::getTotal()
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


}

