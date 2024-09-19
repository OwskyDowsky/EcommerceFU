<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

#[Title('Lista de Usuarios')]
class UserComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    //clases
    public $search = '';
    public $totalRegistros = 0;
    public $cant = 5;
    //modelo
    //modelo
    public $Id;
    public $name;
    public $apellido_paterno;
    public $ci;
    public $email;
    public $password;
    public $estado = "activo";
    public $image;
    public $imageModel;
    public $re_password;
    public $roles;  // Para almacenar los roles disponibles
    public $selectedRole; // Para almacenar el rol seleccionado
    public $userId; // Para almacenar el usuario al que se le asignará el rol

    public function render()

    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->cant);
        $this->totalRegistros = User::count();
        return view('livewire.user.user-component', [
            'users' => $users
        ]);
    }

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function create()
    {
        $this->Id = 0;

        $this->clean();
        $this->dispatch('open-modal', 'modalUser');
    }

    //crear usuarios
    public function store()
    {
        //dump('crear tour');
        $rules = [
            'name' => 'required|min:3|max:80',
            'email' => 'required|email|max:250|unique:users',
            'ci' => 'required|min:7|max:8|unique:users',
            'password' => 'required|min:8',
            're_password' => 'required|same:password',
            'image' => 'image|max:1024|nullable',
            'selectedRole' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'name.max' => 'El nombre solo puede tener 80 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico debe cumplir el formato requerido',
            'email.max' => 'El correo electrónico solo puede tener 250 caracteres',
            'email.unique' => 'El correo electrónico ya esta siendo usado',
            'ci.required' => 'El CI es requerido',
            'ci.min' => 'El CI debe tener minimo 7 caracteres',
            'ci.max' => 'El CI solo puede tener 8 caracteres',
            'ci.unique' => 'El CI ya esta siendo usado',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres',
            're_password.required' => 'La confirmación de contraseña es requerida',
            're_password.same' => 'Las dos contraseñas deben ser iguales',
            'image.image' => 'La imagen debe tener un formato valido',
            'image.max' => 'La imagen debe pesar máximo 1MB',
            'selectedRole.required' => 'El rol del usuario es requerido'
        ];
        $this->validate($rules, $messages);
        $user = new User();

        $user->name = $this->name;
        $user->apellido_paterno = $this->apellido_paterno;
        $user->ci = $this->ci;
        $user->email = $this->email;
        $user->password = bcrypt($this->password); // Encriptar la contraseña
        $user->estado = $this->estado;
        $user->save();

        // Asignar rol al usuario
        $user->assignRole($this->selectedRole);

        // Subir imagen si existe
        if ($this->image) {
            $customName = 'users/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $user->image()->create(['url' => $customName]);
        }

        // Limpiar formulario y cerrar modal
        $this->clean();
        $this->dispatch('close-modal', 'modalUser');
        $this->dispatch('msg', 'Usuario creado con éxito');
    }
    
    public function edit(User $user)
    {
        $this->clean();
        $this->Id = $user->id;
        $this->name = $user->name;
        $this->apellido_paterno = $user->apellido_paterno;
        $this->ci = $user->ci;
        $this->email = $user->email;
        $this->estado = $user->estado;
        $this->imageModel = $user->image ? $user->image->url : null;

        $this->dispatch('open-modal', 'modalUserEdit');

    }
    public function update(User $user)
    {
        //dump($usuario);
        $rules = [
            'name' => 'required|min:3|max:80',
            'email' => 'required|email|max:250|unique:users,id,'.$this->Id,
            'ci' => 'required|min:7|max:8|unique:users,id,'.$this->Id,
            'password' => 'min:8|nullable',
            're_password' => 'same:password',
            'image' => 'image|max:1024|nullable',
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'name.max' => 'El nombre solo puede tener 80 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico debe cumplir el formato requerido',
            'email.max' => 'El correo electrónico solo puede tener 250 caracteres',
            'email.unique' => 'El correo electrónico ya esta siendo usado',
            'ci.required' => 'El CI es requerido',
            'ci.min' => 'El CI debe tener minimo 7 caracteres',
            'ci.max' => 'El CI solo puede tener 8 caracteres',
            'ci.unique' => 'El CI ya esta siendo usado',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres',
            're_password.required' => 'La confirmación de contraseña es requerida',
            're_password.same' => 'Las dos contraseñas deben ser iguales',
            'image.image' => 'La imagen debe tener un formato valido',
            'image.max' => 'La imagen debe pesar máximo 1MB',
        ];

        $this->validate($rules, $messages);

        $user->name = $this->name;
        $user->id = $this->Id;
        $user->apellido_paterno = $this->apellido_paterno;
        $user->ci = $this->ci;
        $user->email = $this->email;
        $user->estado = $this->estado;

        if($this->password){
            $user->password = $this->password;
        }

        $user->update();
        if ($this->image) {
            if ($user->image != null) {
                Storage::delete('public/' . $user->image->url);
                $user->image()->delete();
            }
            $customName = 'users/' . uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('public', $customName);
            $user->image()->create(['url' => $customName]);
        }

        $this->dispatch('close-modal', 'modalUser');
        $this->dispatch('msg', 'Usuario editado correctamente');

        $this->clean();
    }
    #[On('destroyUser')]
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if ($user->image != null) {
            Storage::delete('public/' . $user->image->url);
            $user->image()->delete();
        }
        $user->delete();

        $this->dispatch('msg', 'Usuario Eliminado correctamente');
    }
    // metodo limpieza
    public function clean()
    {
        $this->reset([
            'name', 'apellido_paterno', 'Id', 'ci', 'email', 'password', 'estado', 'image', 
            'imageModel', 'selectedRole'
        ]);
        $this->resetErrorBag();
    }

    public function toggleEstado($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->estado = $user->estado === 'activo' ? 'inactivo' : 'activo';
            $user->save();
        }
    }

    public function openRoleModal($userId)
    {
        $this->userId = $userId;

        $user = User::find($userId);

        $this->selectedRole = $user->roles->first() ? $user->roles->first()->name : null;

        $this->dispatch('open-modal', 'modalRoles');
    }


    public function assignRole()
    {
        $user = User::find($this->userId);
        if ($user && $this->selectedRole) {
            $user->syncRoles($this->selectedRole); // Asigna el rol al usuario
            $this->dispatch('msg', 'Rol asignado correctamente');
        }
        $this->dispatch('close-modal', 'modalRoles');
    }
}
