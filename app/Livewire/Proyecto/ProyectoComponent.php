<?php

namespace App\Livewire\Proyecto;

use App\Models\Proyectos;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

#[Title('Nuestros Proyectos')]
class ProyectoComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad del modelo
    public $Id;
    public $nombre;
    public $descripcion;
    public $estado = "activo";

    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Proyectos::count();
        $proyectos = Proyectos::where('nombre','like','%'.$this->search.'%')
                        ->orderBy('id','desc')
                        ->paginate($this->cant);

        return view('livewire.proyecto.proyecto-component',[
            'proyectos' => $proyectos
        ]);
    }
    public function create(){
        $this->Id=0;

        $this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalProyecto');
        
    }
    //crear proyecto
    public function store(){
        $rules = [
            'nombre' => 'required|min:3|max:30|unique:proyectos'
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 30 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules,$messages);

        $proyecto = new Proyectos();
        $proyecto->nombre = $this->nombre;
        $proyecto->descripcion = $this->descripcion;
        $proyecto->save();

        $this->dispatch('close-modal','modalProyecto');
        $this->dispatch('msg','Proyecto cread0 correctamente');

        $this->clean();
    }
    public function edit(Proyectos $proyecto){
        $this->clean();
        $this->Id = $proyecto->id;
        $this->nombre = $proyecto->nombre;
        $this->descripcion = $proyecto->descripcion;
        $this->dispatch('open-modal','modalProyecto');
    }
    public function update(Proyectos $proyecto){
        $rules = [
            'nombre' => 'required|min:3|max:30|unique:proyectos,id,'.$this->Id
        ];
        $messages = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener minimo 3 caracteres',
            'nombre.max' => 'El nombre solo puede tener 30 caracteres',
            'nombre.unique' => 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules,$messages);

        $proyecto->nombre = $this->nombre;
        $proyecto->descripcion = $this->descripcion;
        $proyecto->update();

        $this->dispatch('close-modal','modalProyecto');
        $this->dispatch('msg','Proyecto editada correctamente');

        $this->clean();
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'nombre', 'Id', 'descripcion', 'estado',
        ]);
        $this->resetErrorBag();
    }

    public function toggleEstado($proyectoId)
    {
        $proyecto = Proyectos::find($proyectoId);
        if ($proyecto) {
            $proyecto->estado = $proyecto->estado === 'activo' ? 'inactivo' : 'activo';
            $proyecto->save();
        }
    }
}
