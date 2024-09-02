<?php

use App\Livewire\Categoria\CategoriaComponent;
use App\Livewire\Home\Inicio;
use Illuminate\Support\Facades\Route;
use App\Livewire\Categoria\CategoriaVer;
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