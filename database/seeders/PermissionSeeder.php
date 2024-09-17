<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define las entidades para las que quieres crear permisos
        $entities = [
            'Categoria',
            'Proyecto',
            'Sede',
            'Producto',
            'Cupon',
            'Usuario',
            'Rol',
            'Permiso',
        ];

        // Define los tipos de acciones (permisos) para cada entidad
        $actions = ['ver', 'crear', 'editar', 'eliminar', 'baja'];

        // Itera sobre cada entidad y acción, creando los permisos correspondientes
        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                Permission::create(['name' => "{$entity} {$action}"]);
            }
        }
    }
}
