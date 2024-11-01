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
    public $pago=0;
    public $devuelve=0;
    public $fecha;
    public $updating=0;

    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistro = Productos::count();
        if($this->updating==0){
            $this->pago= Cart::getTotal();
            $this->devuelve = $this->pago - Cart::getTotal();
        }
        
        
        return view('livewire.venta.venta-create',[
            'productos' => $this->productos,
            'cart' => Cart::getCart(),
            'total' => Cart::getTotal(),
            'totalArticulos' => Cart::totalArticulos(),
        ]);
    }

    /*public function mount()
    {
        $this->client_id($this->client);
    }*/


    public function updatingPago($value){
        $this->updating=1;
        $this->pago= $value;
        $this->devuelve = (int)$this->pago - Cart::getTotal();

    }

    #[On('add-producto')]
    public function addProducto(Productos $producto){
        $this->updating=0;
        //dump($producto);
        Cart::add($producto);
    }

    public function decrement($id){
        $this->updating=0;
        Cart::decrement($id);
        $this->dispatch("incrementStock.{$id}");
    }

    public function clear(){
        Cart::clear();
        $this->pago=0;
        $this->updating=0;
        $this->dispatch('msg', 'Venta cancelada');
        $this->dispatch('refreshProductos');
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

