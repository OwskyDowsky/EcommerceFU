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

    //Lista de deseos vista
    public function wishlist()
    {
        return view('components.ecommerce.ecommerce-wishlist', [
            'productos' => $this->productos(),
        ]);  
    }

    #[Computed()]
    public function productos()
    {
        return Productos::all(); // Obtiene todos los productos
    }
    
    //Detalle del producto vista (slugs)
    public function ProductoInfo($slug)
    {
        // Buscar el producto por slug
        $producto = Productos::where('slug', $slug)->firstOrFail();

        // Devolver la vista con la información del producto
        return view('components.ecommerce.ecommerce-producto-info', compact('producto'));
    }
}

