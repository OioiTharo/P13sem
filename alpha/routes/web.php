<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
    //return view('home', ['produtos' => Produto::all()]);
});
