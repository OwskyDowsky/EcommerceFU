<?php

namespace App\Livewire\Producto;

use App\Models\Productos;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detalles de producto')]
class ProductoVer extends Component
{
    public Productos $producto;

    public function render()
    {
        return view('livewire.producto.producto-ver');
    }
}
