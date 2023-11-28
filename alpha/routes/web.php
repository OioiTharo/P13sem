<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;
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
    return view('home');
});



//rotas
Route::get('/', [HomeController::class, 'home']);

Route::resource('/categorias', CategoriaController::class);

Route::middleware('auth')->group(function () {

    Route::get('/logout', function () {
        Auth::logout();
        return redirect ("/");
    });

    Route::get('/carrinho', function () {
        return view('carrinho');
    })->name('carrinho');


    Route::post('/endereco/store',[EnderecoController::class,'store'])->name('endereco.store');
    Route::resource('/carrinho', CarrinhoController::class);
    Route::resource('/perfil', PedidoController::class);
    Route::get('/checkout',[CarrinhoController::class,'checkout'])->name('checkout');

    
    Route::resource('/produtos', ProdutoController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
