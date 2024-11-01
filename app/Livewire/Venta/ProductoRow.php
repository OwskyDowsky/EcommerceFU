<?php

namespace App\Livewire\Venta;

use App\Models\Productos;
use Livewire\Component;

class ProductoRow extends Component
{

    public Productos $producto;
    public $stock;
    protected function getListeners()
    {
        return[
            "incrementStock.{$this->producto->id}" => "incrementStock",
            "refreshProductos" => "mount"
        ];
    }

    public function render()
    {
        return view('livewire.venta.producto-row');
    }

    public function mount(){
        $this->stock = $this->producto->stock;
    }

    public function addProducto(Productos $producto){
        if($this->stock==0){
            return;
        }
        $this->dispatch('add-producto', $producto);
        $this->stock--;
    }

    public function incrementStock(){
        $this->stock++;
    }


}
