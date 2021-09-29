<?php

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
    return redirect('/home');
});

//Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cardapio', [App\Http\Controllers\HomeController::class, 'cardapio'])->name('cardapio');

Route::get('/teste', [App\Http\Controllers\HomeController::class, 'teste'])->name('teste');




Route::middleware(['auth'])->group(function () {

    //pedido e carrinho
    Route::get('/carrinho', [App\Http\Controllers\PedidoController::class, 'getCarrinho'])->name('carrinho');
    Route::post('/carrinho/add2sabores', [App\Http\Controllers\PedidoController::class, 'postAdd2Sabores'])->name('carrinho.add2sabores');
    Route::post('/carrinho/add', [App\Http\Controllers\PedidoController::class, 'postAddItem'])->name('carrinho.add');
    

    //admin
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');


    //rotas de perfil e usuários
    Route::get('/perfil', [App\Http\Controllers\UserController::class, 'getPerfil'])->name('perfil');
    Route::post('/perfil/senha', [App\Http\Controllers\UserController::class, 'postSenha'])->name('perfil.senha');
    Route::post('/perfil/dados', [App\Http\Controllers\UserController::class, 'postDados'])->name('perfil.dados');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'getUsers'])->name('users');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'getCreate'])->name('user.create');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'getEdit'])->name('user.edit');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'postStore'])->name('user.store');
    Route::post('/user/senha/{id}', [App\Http\Controllers\UserController::class, 'postUserSenha'])->name('user.senha');
    Route::post('/user/dados/{id}', [App\Http\Controllers\UserController::class, 'postUserDados'])->name('user.dados');
    Route::post('/user/status/{id}', [App\Http\Controllers\UserController::class, 'postUserStatus'])->name('user.status');
});





//Route::get('profile', function () {
    // Only verified users may enter...
//})->middleware('verified');
