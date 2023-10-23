<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoImagemController;
use App\Http\Controllers\HomeController;

Route::resource('produtos', ProdutoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('produtoimagens', ProdutoImagemController::class);


Route::get('/', [ProdutoController::class, 'home'], );
Route::get('/', [CategoriaController::class, 'home']);



Route::get('/', [HomeController::class, 'home']);
