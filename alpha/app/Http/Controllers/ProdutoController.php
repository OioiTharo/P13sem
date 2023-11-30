<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;

class ProdutoController extends Controller
{
    public function obterProdutosPorCategoria($categoriaId) {
        // Obter produtos da categoria
        $produtos = Produto::where('CATEGORIA_ID', $categoriaId)->get();
        
        $categorias = Categoria::all();
        // Retornar a view parcial com os produtos filtrados
        return view('partial.produtos', ['categorias' => $categorias])->with('produtos', $produtos);
    }

    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('produtos', ['produtos' =>  $produtos, 'categorias' => $categorias]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', ['produto'=> $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
