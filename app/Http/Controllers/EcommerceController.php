<?php

namespace App\Http\Controllers;

use App\Models\CartCliente; // Importa el modelo para el carrito no autenticado
use Illuminate\Http\Request;
use App\Models\Productos;
use Livewire\Attributes\Computed;

class EcommerceController extends Controller
{
    public function index()
    {
        return view('components.ecommerce.ecommerce', [
            'productos' => $this->productos(),
        ]);
    }

    #[Computed()]
    public function productos()
    {
        return Productos::all(); // Obtiene todos los productos
    }
}

