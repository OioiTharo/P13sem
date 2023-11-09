<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $usuario = Auth::user();
        Carrinho::create(['USUARIO_ID'=>$usuario->USUARIO_ID,
                          'PRODUTO_ID'=>$request->PRODUTO_ID, 
                          'ITEM_QTD'=>$request->ITEM_QTD]);
        return redirect(route('carrinho'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrinho $carrinho)
    {
        $carrinhos = Carrinho::all();
        return view('carrinho', ['carrinhos' => $carrinhos]);
    }

    public function checkout(Carrinho $carrinho)
    {
        $carrinhos = Carrinho::all();
        return view('checkout', ['carrinhos' => $carrinhos]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrinho $carrinho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrinho $carrinho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrinho $carrinho)
    {
        //
    }
}
