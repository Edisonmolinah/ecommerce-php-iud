<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario');
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'actionEdit'])->name('usuario.action.edit');
Route::put('/usuario/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');

Route::get('/autor', [AutorController::class, 'index'])->name('autor');
Route::post('/autor', [AutorController::class, 'store'])->name('autor.store');
Route::get('/autor/edit/{id}', [AutorController::class, 'actionEdit'])->name('autor.action.edit');
Route::put('/autor/{id}', [AutorController::class, 'edit'])->name('autor.edit');

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
