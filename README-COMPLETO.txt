Proyecto Laravel 10 con Livewire 3
ECOMMERCE
Descripción
Este es un proyecto desarrollado en Laravel 10 con Livewire 3.

Tecnologías utilizadas
Laravel 10: Framework PHP para desarrollo de aplicaciones web.
Livewire 3: Framework de componentes para Laravel que permite actualizaciones dinámicas sin necesidad de usar JavaScript.
Quiero aclarar que para esta oportunidad use unicamente laravel, por lo que vite no esta puesto en funcionamiento este.
Antes de ejecutar este proyecto, asegúrate de tener instalados los siguientes programas:

PHP 8.1 o superior.
Composer: Gestor de dependencias para PHP.
Node.js y npm: Para la gestión de los recursos frontend (si es necesario).
Base de datos: MySQL.

Instalacion

1. git clone https://github.com/OwskyDowsky/EcommerceFU.git
    1.1 cd al repositorio

2. composer install

3. composer require livewire/livewire

4. php artisan key:generate

5. Montar la base de datos con el nombre de ecommerce-fu.sql, que esta en el directorio fuente.

6. php artisan livewire:publish --config

7. php artisan storage:link (En caso que muestre que ya existe la creacion de uno, se puede eliminar y volverlo a crear)

8. php artisan serve (Montar el servidor)

Para ingresar al sistema como super administrador primero tenemos que revisar que laravel spaties este funcionado correctamente.

9. composer require spatie/laravel-permission

9.1 Revisar la configuracion en config/app.php:
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];

9.2 Publicar la migración:
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

9.3 Migrar la tabla en la BD:
    php artisan migrate --path=/database/migrations/2024_09_11_142842_create_permission_tables.php

9.3 php artisan make:seeder PermissionSeeder

9.4 php artisan db:seed --class=PermissionSeeder

10. En la terminal del proyecto fuente, iniciar el servidor apache
    php artisan serve

CREDENCIALES

email
    superadmin@gmail.com
password
    12345678
