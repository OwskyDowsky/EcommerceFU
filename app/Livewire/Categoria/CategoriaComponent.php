<?php

namespace App\Livewire\Categoria;

use Livewire\Component;
use App\Models\Categorias;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Categorias')]
class CategoriaComponent extends Component
{
    use WithPagination;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad modelo
    public $nombre;
    public $Id;

    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Categorias::count();

        $categorias = Categorias::where('nombre','like','%'.$this->search.'%')
                        ->orderBy('id','desc')
                        ->paginate($this->cant);
        //$categorias = collect();

        return view('livewire.categoria.categoria-component',[
            'categorias' => $categorias
        ]);
    }
    public function mount(){
        
    }
    public function create(){
        $this->Id=0;

        $this->reset(['nombre']);
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalCategoria');
        
    }
    //crear la categoria
    public function store(){
        //dump('crear categoria');
        $rules = [
            'nombre' => 'required|min:3|max:14|unique:categorias'
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 14 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules,$messages);

        $categoria = new Categorias();
        $categoria->nombre = $this->nombre;
        $categoria->save();

        $this->dispatch('close-modal','modalCategoria');
        $this->dispatch('msg','Categoria creada correctamente');

        $this->reset(['nombre']);
    }
    public function edit(Categorias $categoria){
        //agrege el reset si no da eliminar reset nombre
        $this->reset(['nombre']);
        $this->Id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->dispatch('open-modal','modalCategoria');

        //dump($categoria);
    }
    public function update(Categorias $categoria){
        //dump($categoria);
        $rules = [
            'nombre' => 'required|min:3|max:14|unique:categorias,id,'.$this->Id
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 14 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules,$messages);

        $categoria->nombre = $this->nombre;
        $categoria->update();

        $this->dispatch('close-modal','modalCategoria');
        $this->dispatch('msg','Categoria editada correctamente');

        $this->reset(['nombre']);
    }
    #[On('destroyCategoria')]
    public function destroy($id){
        //dump($id);
        $categoria = Categorias::findOrfail($id);
        $categoria->delete();

        $this->dispatch('msg','Categoria Eliminada correctamente');
    }
}