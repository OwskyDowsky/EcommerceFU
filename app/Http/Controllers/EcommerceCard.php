<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class EcommerceCard extends Controller
{
    //
    use WithPagination;
    //propiedades
    public $search='';
    public $cant=5;
    public $totalRegistro=0;

    public function carrito()
    {
        $productos = Productos::all();
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistro = Productos::count();

        return view('components.ecommerce.ecommerce-card', compact('productos')); // Asegúrate de que la ruta sea correcta
        
    }
}