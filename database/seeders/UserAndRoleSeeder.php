<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario
        $user = User::create([
            'name' => 'Super',
            'apellido_paterno' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'ci' => '12345678',
            'estado' => 'activo',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        // Crear un rol y asignarle todos los permisos
        $role = Role::create(['name' => 'Super Admin']);

        // Obtener todos los permisos
        $permissions = Permission::all();

        // Asignar todos los permisos al rol
        $role->syncPermissions($permissions);

        // Asignar el rol al usuario
        $user->assignRole($role);
    }
}
