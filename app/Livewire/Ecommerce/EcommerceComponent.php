<?php

namespace App\Livewire\Ecommerce;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Productos;
use App\Models\Categorias;

class EcommerceComponent extends Component
{
    use WithPagination;

    public $selectedCategoria = '';
    public $search = '';

    protected $queryString = [
        'selectedCategoria' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function updatingSelectedCategoria()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categorias = Categorias::all();

        $productos = Productos::query()
            ->when($this->selectedCategoria, fn ($query) => $query->where('categoria_id', $this->selectedCategoria))
            ->when($this->search, fn ($query) => $query->where('nombre', 'like', '%' . $this->search . '%'))
            ->paginate(9);

        return view('livewire.ecommerce.ecommerce-component', compact('categorias', 'productos'))
            ->layout('layouts.ecommerce');
    }
}
