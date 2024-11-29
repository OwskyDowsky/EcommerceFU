<?php

use App\Http\Controllers\EcommerceCard;
use App\Livewire\Home\Inicio;
use Illuminate\Support\Facades\Route;
use App\Livewire\Proyecto\ProyectoVer;
use App\Livewire\Categoria\CategoriaVer;
use App\Livewire\Producto\ProductoComponent;
use App\Livewire\Proyecto\ProyectoComponent;
use App\Livewire\Categoria\CategoriaComponent;
use App\Livewire\Cupon\CuponComponent;
use App\Livewire\Cupon\CuponCategoriaComponent;
use App\Livewire\Cupon\CuponProductoComponent;
use App\Livewire\Permission\PermissionComponent;
use App\Livewire\Producto\ProductoVer;
use App\Livewire\Rol\RolComponent;
use App\Livewire\Rol\RolPermisoComponent;
use App\Livewire\Sede\SedeComponent;
use App\Livewire\User\UserComponent;
use App\Livewire\User\UserVer;
use App\Livewire\Activitylogs\LogsComponent;
use App\Livewire\Activitylogs\LogsVer;
//use App\Livewire\Ecommerce\EcommerceComponent;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\PdfController;
use App\Livewire\Venta\VentaCreate;
use App\Livewire\Cliente\ClienteComponent;
use App\Livewire\Cupon\CuponesComponent;
use App\Livewire\Venta\VentaList;
use App\Livewire\Ecommerce\EcommerceComponent;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', EcommerceComponent::class)->name('ecommerce');
Route::get('/sanasana', EcommerceComponent::class)->name('ecommerce');
/*Route::get('/sanasana', [EcommerceController::class, 'index'])->name('index');
Route::get('/', [EcommerceController::class, 'index']);
Route::get('/ecommerce/card', [EcommerceCard::class, 'carrito'])->name('carrito');
Route::get('/ecommerce/wishlist', [EcommerceController::class, 'wishlist'])->name('wishlist');*/
Route::get('/detalle-producto/{slug}', [EcommerceController::class, 'ProductoInfo'])->name('producto.info');
/*con auth*/
Route::get('/home',Inicio::class)->name('home')->middleware(['auth']);
Route::get('/categorias',CategoriaComponent::class)->name('categorias')->middleware(['auth', 'can:Categoria ver']);
Route::get('/categorias/{categoria}', CategoriaVer::class)->name('categorias.ver')->middleware(['auth', 'can:Categoria ver']);
/* nuestros proyectos*/
Route::get('/proyectos',ProyectoComponent::class)->name('proyectos')->middleware(['auth', 'can:Proyecto ver']);
Route::get('/proyectos/{proyecto}',ProyectoVer::class)->name('proyectos.ver')->middleware(['auth', 'can:Proyecto ver']);
/*productos*/
Route::get('/productos',ProductoComponent::class)->name('productos')->middleware(['auth', 'can:Producto ver']);
Route::get('/productos/{producto}',ProductoVer::class)->name('productos.ver')->middleware(['auth', 'can:Producto ver']);
/*sedes*/
Route::get('/sedes',SedeComponent::class)->name('sedes')->middleware(['auth', 'can:Sede ver']);
/*cupones*/
Route::get('/cupones',CuponesComponent::class)->name('cupones')->middleware(['auth', 'can:Cupon ver']);
/*usuarios*/
Route::get('/usuarios',UserComponent::class)->name('usuarios')->middleware(['auth', 'can:Usuario ver']);
Route::get('/usuarios/{user}',UserVer::class)->name('users.ver')->middleware(['auth', 'can:Usuario ver']);
/*roles*/
Route::get('/roles',RolComponent::class)->name('roles')->middleware(['auth', 'can:Rol ver']);
/*permiso*/
Route::get('/permisos',PermissionComponent::class)->name('permisos')->middleware(['auth', 'can:Permiso ver']);
/*roles y permisos*/
Route::get('/roles/{role}', RolPermisoComponent::class)->name('roles.permisos')->middleware(['auth', 'can:Rol editar']);
/*activity logs*/
Route::get('/logs', LogsComponent::class)->name('logs')->middleware(['auth']);
Route::get('/logs/{log}', LogsVer::class)->name('logs.ver')->middleware(['auth']);

Route::get('/ecommerce', EcommerceComponent::class)->name('ecommerce');
//Route::get('/ecommerce', [EcommerceController::class, 'index']);

/*clientes usuarios estudiantes*/
Route::get('/clientes',ClienteComponent::class)->name('clientes')->middleware(['auth', 'can:Cliente ver']);
/*ventas*/
Route::get('/ventas/crear',VentaCreate::class)->name('ventas.create')->middleware(['auth']);
Route::get('/ventas', VentaList::class)->name('ventas.list')->middleware(['auth']);
Route::get('/ventas/invoice/{venta}',[PdfController::class,'invoice'])->name('ventas.invoice')->middleware(['auth']);
//Route::get('/ecommerce', EcommerceComponent::class)->name('ecommerce');
