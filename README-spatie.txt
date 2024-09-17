Composer:
composer require spatie/laravel-permission

Configuracion en config/app.php:
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];

Publicar la migración:
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

Migrar la tabla en la BD:
php artisan migrate --path=/database/migrations/2024_09_11_142842_create_permission_tables.php

Añadir en app/Models/User:
use Spatie\Permission\Traits\HasRoles;
use HasApiTokens, HasFactory, Notifiable, HasRoles;

Modificar el sidebar.blade.php y el app.blade.php en layouts vista

Agregar en web.php:
/*roles*/
Route::get('/roles',RolComponent::class)->name('roles');
/*permiso*/
Route::get('/permisos',PermissionComponent::class)->name('permisos');
/*roles y permisos*/
Route::get('/roles/{role}', RolPermisoComponent::class)->name('roles.permisos');



-------------------------------------------------------------------------------------------------------------

Agregar lo siguiente:
php artisan make:seeder PermissionSeeder

Ejecutar lo siguiente:
php artisan db:seed --class=PermissionSeeder

