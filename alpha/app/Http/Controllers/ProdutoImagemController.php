<?php

namespace App\Http\Controllers;

use App\Models\ProdutoImagem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getProdutoImagens()
    {
        // Aqui, você pode obter as categorias da maneira desejada.
        $produtoImagens = ProdutoImagem::all();

        return $produtoImagens;
    }
    
    public function index()
    {
        //
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
    public function show(ProdutoImagem $produtoImagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoImagem $produtoImagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoImagem $produtoImagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdutoImagem $produtoImagem)
    {
        //
    }
}
