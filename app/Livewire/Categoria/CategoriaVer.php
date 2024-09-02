<?php

namespace App\Livewire\Categoria;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ver Categorias')]
class CategoriaVer extends Component
{
    public function render()
    {
        return view('livewire.categoria.categoria-ver');
    }
}
