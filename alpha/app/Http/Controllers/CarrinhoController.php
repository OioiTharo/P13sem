<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    
    public function index(Carrinho $carrinho)
    {
        $usuario = Auth::user();
        $carrinhos = Carrinho::all();
        return view('carrinho', ['carrinhos' => $carrinhos]);
    }

    public function store(Request $request)
    {
        $usuario = Auth::user();
        $produto = $request->PRODUTO_ID;
        
        $carrinhoItem = Carrinho::where('USUARIO_ID', $usuario->USUARIO_ID && 'PRODUTO_ID', $produto)
            ->first();
    
        if ($carrinhoItem) {
            $carrinhoItem->ITEM_QTD += $request->ITEM_QTD; 
            $carrinhoItem->save();
        } else {
            Carrinho::create([
                'USUARIO_ID' => $usuario->USUARIO_ID,
                'PRODUTO_ID' => $request->PRODUTO_ID,
                'ITEM_QTD'   => $request->ITEM_QTD,
            ]);
        }
        return redirect(route('carrinho.index'));
    }
        
    
    public function checkout(Carrinho $carrinho)
    {
        $carrinhos = Carrinho::all();
        return view('checkout', ['carrinhos' => $carrinhos]);
    }

}
