<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hola',function(Request $request) {
    $nombre = $request ->query('nombre');
    return "Hola,$nombre";
});
