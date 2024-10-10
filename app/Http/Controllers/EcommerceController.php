<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class EcommerceController extends Controller
{
    //
    public function index()
    {
        $productos = Productos::all();

        return view('components.ecommerce.ecommerce', compact('productos')); // Asegúrate de que la ruta sea correcta
    }
}
