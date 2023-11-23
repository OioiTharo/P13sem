<?php

namespace App\Http\Controllers;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PedidoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $pedidos = Pedido::where(['USUARIO_ID' => $usuario->USUARIO_ID])->get();
        return view('perfil', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Auth::user();
        $produto = $request->ENDERECO_ID;
        $data = Carbon::now();
        $status = 1;
        
        Pedido::create([
            'USUARIO_ID' => $usuario->USUARIO_ID,
            'ENDERECO_ID' => $request->ENDERECO_ID,
            'PEDIDO_DATA' => $data,
            'STATUS_ID' => $status,
        ]);
        
        $carrinhoItens = Carrinho::where('USUARIO_ID', $usuario->USUARIO_ID)->get();
        
        foreach($carrinhoItens as $item){
            $item->ITEM_QTD = 0;
            $item->save();
        }
        return redirect(route('perfil.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
