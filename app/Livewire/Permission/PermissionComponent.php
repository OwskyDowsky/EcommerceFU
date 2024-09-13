<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

#[Title('Lista de permisos')]
class PermissionComponent extends Component
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
        if($this->search != ''){
            $this->resetPage();
        }
        $this->totalRegistros = Permission::count();
        $permissions = Permission::where('name', 'like', "%{$this->search}%")
                    ->orderBy('id', 'desc')
                    ->paginate($this->cant);
        return view('livewire.permission.permission-component', [
            'permissions' => $permissions,
        ]);
    }
    public function mount(){
    }
    public function create(){
        $this->Id = 0;
        $this->clean();
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalPermission');
    }
    
    public function store(){
        $rules = [
            'name' => 'required|min:3|max:30|unique:permissions'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener mínimo 3 caracteres',
            'name.max' => 'El nombre solo puede tener 30 caracteres',
            'name.unique' => 'El nombre del permiso ya existe'
        ];
        $this->validate($rules, $messages);

        $permission = new Permission();
        $permission->name = $this->name;
        $permission->save();

        $this->dispatch('close-modal', 'modalPermission');
        $this->dispatch('msg', 'Permiso creado correctamente');
        $this->clean();
    }
    public function edit(Permission $permission){
        $this->clean();
        $this->Id = $permission->id;
        $this->name = $permission->name;
        $this->dispatch('open-modal', 'modalPermission');
    }
    public function update(Permission $permission){
        $rules = [
            'name' => 'required|min:3|max:30|unique:permissions'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'name.max' => 'El nombre solo puede tener 30 caracteres',
            'name.unique' => 'El nombre del permiso ya existe'
        ];
        $this->validate($rules);
        
        $permission->name = $this->name;
        $permission->update();

        $this->dispatch('close-modal', 'modalPermission');
        $this->dispatch('msg', 'Permiso editado correctamente');
        $this->clean();
    }
    #[On('destroyPermission')]
    public function destroy($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();

        $this->dispatch('msg', 'Permiso eliminado correctamente');
    }

    public function clean(){
        $this->reset(['name', 'Id']);
        $this->resetErrorBag();
    }
    public function toggleEstado($categoriaId)
    {
       
    }
}

