<?php

namespace App\Http\Controllers;

use App\Models\CartCliente;
use Illuminate\Http\Request;
use App\Models\Productos;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class EcommerceCard extends Controller
{
    use WithPagination;

    public $search = '';
    public $cant = 5;

    public function carrito()
    {
        return view('components.ecommerce.ecommerce-card', [
            'productos' => $this->productos(),
        ]);
    }
    #[Computed()]
    public function productos()
    {
        return Productos::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
    }
}
