<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoImagemController;
class HomeController extends Controller
{
    public function home()
    {
        // Crie uma instância do controlador ProdutoController
        $produtoController = new ProdutoController();
        
        // Chame o método getProdutos() a partir da instância
        $produtos = $produtoController->getProdutos();

        // Você pode fazer o mesmo para o controlador CategoriaController
        $categoriaController = new CategoriaController();
        $categorias = $categoriaController->getCategorias();

        $produtoimagemController = new ProdutoImagemController();
        $produtoImagens = $produtoimagemController->getProdutoImagens();
        return view('home', ['produtos' => $produtos, 'categorias' => $categorias, 'produtoImagens' => $produtoImagens]);
    }
}
