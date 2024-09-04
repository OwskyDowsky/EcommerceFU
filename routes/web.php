<?php

use App\Livewire\Home\Inicio;
use Illuminate\Support\Facades\Route;
use App\Livewire\Proyecto\ProyectoVer;
use App\Livewire\Categoria\CategoriaVer;
use App\Livewire\Producto\ProductoComponent;
use App\Livewire\Proyecto\ProyectoComponent;
use App\Livewire\Categoria\CategoriaComponent;
use App\Livewire\Cupon\CuponComponent;
use App\Livewire\Producto\ProductoVer;
use App\Livewire\Sede\SedeComponent;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/inicio',Inicio::class)->name('inicio');
Route::get('/categorias',CategoriaComponent::class)->name('categorias');
Route::get('/categorias/{categoria}', CategoriaVer::class)->name('categorias.ver');
/* nuestros proyectos*/
Route::get('/proyectos',ProyectoComponent::class)->name('proyectos');
Route::get('/proyectos/{proyecto}',ProyectoVer::class)->name('proyectos.ver');
/*productos*/
Route::get('/productos',ProductoComponent::class)->name('productos');
Route::get('/productos/{producto}',ProductoVer::class)->name('productos.ver');
/*sedes*/
Route::get('/sedes',SedeComponent::class)->name('sedes');
/*cupones*/
Route::get('/cupones',CuponComponent::class)->name('cupones');