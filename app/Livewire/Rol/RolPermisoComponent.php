<?php

namespace App\Livewire\Rol;

use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

#[Title('Roles y Permisos')]
class RolPermisoComponent extends Component
{
    public Role $role;
    public $selectedPermissions = []; // Arreglo para manejar los permisos seleccionados

    public function mount()
    {
        // Obtener los permisos asignados al rol
        $this->selectedPermissions = $this->role->permissions->pluck('id')->toArray();
    }

    public function render()
    {
        // Obtener todos los permisos disponibles
        $permissions = Permission::all();

        return view('livewire.rol.rol-permiso-component', [
            'permissions' => $permissions
        ]);
    }

    public function updatePermissions()
    {
        // Convertir los IDs seleccionados a nombres de permisos
        $permissions = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
        
        // Sincronizar los permisos seleccionados (por nombre) con el rol
        $this->role->syncPermissions($permissions);

        // Actualizar la lista de permisos seleccionados después de sincronizar
        $this->selectedPermissions = $this->role->permissions->pluck('id')->toArray();

        $this->dispatch('msg', 'Permisos actualizados correctamente');
    }
}
