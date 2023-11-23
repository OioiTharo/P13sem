<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
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
        return view('perfil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Auth::user();
        Endereco::create(['USUARIO_ID'=>$usuario->USUARIO_ID, 
                         'ENDERECO_NOME'=>$request->ENDERECO_NOME,  
                         'ENDERECO_LOGRADOURO'=>$request->ENDERECO_LOGRADOURO, 
                         'ENDERECO_NUMERO'=>$request->ENDERECO_NUMERO, 
                         'ENDERECO_COMPLEMENTO'=>$request->ENDERECO_COMPLEMENTO,
                         'ENDERECO_CEP'=>$request->ENDERECO_CEP,
                         'ENDERECO_CIDADE'=>$request->ENDERECO_CIDADE,
                         'ENDERECO_ESTADO'=>$request->ENDERECO_ESTADO]);
        return redirect(route('perfil.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endereco $endereco)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Endereco $endereco)
    {
        $endereco->update($request->all());
        return redirect(route('perfil', $endereco->ENDERECO_ID));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}
