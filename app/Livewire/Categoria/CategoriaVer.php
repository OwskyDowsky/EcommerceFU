<?php

namespace App\Livewire\Categoria;

use Livewire\Component;
use App\Models\Categorias;
use App\Models\Productos;
use Livewire\Attributes\Title;

#[Title('Ver Categorias')]
class CategoriaVer extends Component
{
    public Categorias $categoria;
    
    public function render()
    {
        return view('livewire.categoria.categoria-ver');
    }
}
