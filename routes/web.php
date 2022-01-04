<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

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
    return view('home', ['pagina' => 'home']);
})->name('home');

//prod C
Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');
Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');
//prod R
Route::get('produtos', [ProdutosController::class, 'index'])->middleware('verified')->name('produtos');
Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name('produtos.show');
//prod U
Route::get('/produtos/{prod}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{prod}/editar', [ProdutosController::class, 'update'])->name('produtos.update');
//prod D
Route::get('/produtos/{prod}/apagar', [ProdutosController::class, 'remove'])->name('produtos.remove');
Route::delete('/produtos/{prod}/apagar', [ProdutosController::class, 'delete'])->name('produtos.delete');
//prod imagem
Route::get('/produtos/{prod}/recorte', [ProdutosController::class, 'crop'])->name('produtos.crop');
Route::post('/produtos/{prod}/recorte', [ProdutosController::class, 'image'])->name('produtos.image');

Route::get('perfil', [UsuariosController::class, 'profile'])->middleware('auth')->name('perfil');

Route::get('/perfil/editar', [UsuariosController::class, 'edit'])->middleware('auth')->name('perfil.edit');
Route::put('/perfil/{user}/editar', [UsuariosController::class, 'update'])->middleware('auth')->name('perfil.record');

Route::get('/perfil/senha', [UsuariosController::class, 'editPassword'])->middleware('auth')->name('perfil.password');
Route::put('/perfil/{user}/senha', [UsuariosController::class, 'updatePassword'])->middleware('auth')->name('perfil.record.password');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::prefix('usuarios')->group(function () {

    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');
    
});

Route::get('/email/verify', function () {
    return view('auth.verify-email', ['pagina' => 'verify-email']);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');
