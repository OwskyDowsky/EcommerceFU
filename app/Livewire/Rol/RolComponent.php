<?php

namespace App\Livewire\Rol;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Role;

#[Title('Roles')]
class RolComponent extends Component
{
    use WithPagination;
    public $search='';
    public $totalRegistros=0;
    public $cant=5;
    //propiedad modelo
    public $name; // Para crear/editar roles
    public $Id; // Para identificar si es crear o editar

    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->totalRegistros = Role::count();
        // Obtener roles paginados según el término de búsqueda
        $roles = Role::where('name', 'like', "%{$this->search}%")
                ->orderBy('id','desc')
                ->paginate($this->cant);
            
        $this->totalRegistros = Role::count();

        return view('livewire.rol.rol-component', [
            'roles' => $roles,
        ]);
    }

    public function mount(){
    }
    public function create(){
        $this->Id=0;

        $this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalRole');
    }
    //crear la categoria
    public function store(){
        $rules = [
            'name' => 'required|min:3|max:30|unique:roles'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'name.max' => 'El nombre solo puede tener 30 caracteres',
            'name.unique' => 'El nombre de la rol ya existe'
        ];
        $this->validate($rules,$messages);

        $role = new Role();
        $role->name = $this->name;
        $role->save();

        $this->dispatch('close-modal','modalRole');
        $this->dispatch('msg','Rol creada correctamente');

        $this->clean();
    }
    public function edit(Role $role){
        $this->clean();
        $this->Id = $role->id;
        $this->name = $role->name;
        $this->dispatch('open-modal','modalRole');
    }
    public function update(Role $role){
        //dump($categoria);
        $rules = [
            'name' => 'required|min:3|max:30|unique:roles'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'name.max' => 'El nombre solo puede tener 30 caracteres',
            'name.unique' => 'El nombre de la rol ya existe'
        ];
        $this->validate($rules,$messages);

        $role->name = $this->name;
        $role->update();

        $this->dispatch('close-modal','modalRole');
        $this->dispatch('msg','Rol editado correctamente');

        $this->clean();
    }
    #[On('destroyRole')]
    public function destroy($id){
        //dump($id);
        $role = Role::findOrfail($id);
        $role->delete();

        $this->dispatch('msg','Rol Eliminado correctamente');
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'name', 'Id', 
        ]);
        $this->resetErrorBag();
    }
    public function toggleEstado($categoriaId)
    {
       
    }
}
