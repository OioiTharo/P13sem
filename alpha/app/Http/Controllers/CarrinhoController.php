<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        $carrinhos = Carrinho::all();
        return view('carrinho', ['produtos' =>  $produtos, 'carrinhos' => $carrinhos]);
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
        $produtoId = $request->input('produto_id');
        $produto = Produto::find($produtoId);
        $quantidade = $request->input('quantidade');

        $request->validate([
            'produto_id' => 'required|exists:PRODUTO,PRODUTO_ID',
        ]);
        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario->USUARIO_ID)
            ->where('PRODUTO_ID', $produtoId)
            ->first();
        
        if ($carrinhoItem) {
            // Item já existe no carrinho, atualize a quantidade
            $carrinhoItem->$quantidade;
            $carrinhoItem->save();
        } else {
            // Item não existe no carrinho, crie um novo
            Carrinho::create([
                'USUARIO_ID' => $usuario->USUARIO_ID,
                'PRODUTO_ID' => $produtoId,
                'ITEM_QTD'   => $quantidade,
            ]);
        }
        $produtos = Produto::all();
        $carrinhos = Carrinho::all();
        return view('carrinho', ['produtos' =>  $produtos, 'carrinhos' => $carrinhos]);

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
        $carrinho->update([
            'ITEM_QTD' => $request->input('quantidade'),
        ]);
    
        return redirect(route('carrinho', ['carrinho' => $carrinho->PRODUTO_ID]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrinho $carrinho)
    {
        //
    }
}
