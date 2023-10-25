<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Produto;
use App\Models\Categoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoImagemController;
class HomeController extends Controller
{
    public function home()
    {
        $produtos = Produto::all()->take(10);
        $categorias = Categoria::all();
        return view('home', ['produtos' => $produtos, 'categorias' => $categorias]);
    }
}
