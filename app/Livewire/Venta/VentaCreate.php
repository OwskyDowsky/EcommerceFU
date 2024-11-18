<?php

namespace App\Livewire\Venta;

use App\Models\Cart;
use App\Models\Item;
use Livewire\Component;
use App\Models\Productos;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;
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
    public $estado = 'activo';

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
    //crear venta
    public function createVenta(){
        $cart = Cart::getCart();

        if(count($cart)==0){
            $this->dispatch('msg','no hay productos',"danger");
            return;
        }

        if($this->pago<Cart::getTotal()){
            $this->pago = Cart::getTotal();
            $this->devuelve = 0;
        }

        DB::transaction(function () {
            $venta = new Ventas();
            $venta->total = Cart::getTotal();
            $venta->pago = $this->pago;
            $venta->users_id = userID();
            $venta->clientes_id = $this->client;
            $venta->fecha = date('Y-m-d');
            $venta->save();

            foreach(\Cart::session(userID())->getContent() as $producto){
                $item = new Item();
                $item->nombre = $producto->name;
                $item->precio = $producto->price;
                $item->qty = $producto->quantity;
                $item->imagen = $producto->associatedModel->imagen;
                $item->fecha = date('Y-m-d');
                $item->save();

                $venta->items()->attach($item->id,['qty'=>$producto->quantity,'fecha'=>date('Y-m-d')]);

                Productos::find($producto->id)->decrement('stock',$producto->quantity);
            }

            Cart::clear();
            $this->reset(['pago','devuelve','client']);
            $this->dispatch('msg','venta creada correctamente','success');
        });
    }

    public function mount()
    {
        $this->client_id($this->client);
    }


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
    #[On('client_id')]
    public function client_id($id = 1)
    {
        $this->client = $id;
    }


}

