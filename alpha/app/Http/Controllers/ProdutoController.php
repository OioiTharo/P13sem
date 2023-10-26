<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('produtos', ['produtos' =>  $produtos, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
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
