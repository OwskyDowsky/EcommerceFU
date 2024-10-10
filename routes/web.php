<?php

use App\Http\Controllers\EcommerceCard;
use App\Livewire\Home\Inicio;
use App\Livewire\User\UserVer;
use App\Livewire\Rol\RolComponent;
use App\Livewire\Venta\VentaCreate;
use App\Livewire\Sede\SedeComponent;
use App\Livewire\User\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Cupon\CuponComponent;
use App\Livewire\Producto\ProductoVer;
use App\Livewire\Proyecto\ProyectoVer;
use App\Livewire\Categoria\CategoriaVer;
use App\Livewire\Rol\RolPermisoComponent;
use App\Livewire\Cliente\ClienteComponent;
use App\Livewire\Producto\ProductoComponent;
use App\Livewire\Proyecto\ProyectoComponent;
use App\Http\Controllers\EcommerceController;
use App\Livewire\Categoria\CategoriaComponent;
use App\Livewire\Cupon\CuponComponent;
use App\Livewire\Permission\PermissionComponent;
use App\Livewire\Producto\ProductoVer;
use App\Livewire\Rol\RolComponent;
use App\Livewire\Rol\RolPermisoComponent;
use App\Livewire\Sede\SedeComponent;
use App\Livewire\User\UserComponent;
use App\Livewire\User\UserVer;
use App\Livewire\Ecommerce\EcommerceComponent;
use App\Http\Controllers\EcommerceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['register'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',Inicio::class)->name('home')->middleware(['auth']);
/*categorias*/
Route::get('/categorias',CategoriaComponent::class)->name('categorias')->middleware(['auth']);
Route::get('/categorias/{categoria}', CategoriaVer::class)->name('categorias.ver')->middleware(['auth']);
/* nuestros proyectos*/
Route::get('/proyectos',ProyectoComponent::class)->name('proyectos')->middleware(['auth']);
Route::get('/proyectos/{proyecto}',ProyectoVer::class)->name('proyectos.ver')->middleware(['auth']);
/*productos*/
Route::get('/productos',ProductoComponent::class)->name('productos')->middleware(['auth']);
Route::get('/productos/{producto}',ProductoVer::class)->name('productos.ver')->middleware(['auth']);
/*sedes*/
Route::get('/sedes',SedeComponent::class)->name('sedes')->middleware(['auth']);
/*cupones*/
Route::get('/cupones',CuponComponent::class)->name('cupones')->middleware(['auth']);
Route::get('/cupones-categoria',CuponCategoriaComponent::class)->name('cupones.categoria')->middleware(['auth']);
Route::get('/cupones-producto',CuponProductoComponent::class)->name('cupones.producto')->middleware(['auth']);
/*usuarios*/
Route::get('/usuarios',UserComponent::class)->name('usuarios')->middleware(['auth']);
Route::get('/usuarios/{user}',UserVer::class)->name('users.ver')->middleware(['auth']);
/*roles*/
Route::get('/roles',RolComponent::class)->name('roles')->middleware(['auth']);
/*permiso*/
Route::get('/permisos',PermissionComponent::class)->name('permisos')->middleware(['auth']);

Route::get('/roles/{role}', RolPermisoComponent::class)->name('roles.permisos')->middleware(['auth']);

//Route::get('/ecommerce', EcommerceComponent::class)->name('ecommerce');
Route::get('/ecommerce', [EcommerceController::class, 'index']);