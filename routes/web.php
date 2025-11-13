<?php

use App\Models\Cliente;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/clientes',function (){
    return view('clientes.index',[
        'clientes' => Cliente::all(),
    ]);

});

Route::get('/clientes/create',function (){
    return view("clientes.create");
    // Cliente::create([
    //  "dni" => '11113',
    //  "nombre" => 'Pepe',
    //  "apellidos" => 'Perez',
    //  "direccion" => 'Calle Ancha',
    //  "codpostal" => 11540,
    //  "telefono" => '123456789',
    // ]);

});


Route::delete('/clientes/borrar/{cliente}', function (Cliente $cliente) {
    $cliente->delete();
    return redirect('/clientes');
});

//Todas estas formas de hacerlo, son "técnicas", podemos usar una fachada, un helper,etc...
/*Route::get('/hola',function (){
    $nombre = request() -> query('nombre'); //Esto es un helper
    return "Hola,$nombre";
});*/
/*Route::get('/hola',function() { //Usamos una fachada(facade), son clases que solo tienen métodos estáticos
    $nombre = Request::query('nombre');
    return "Hola,$nombre";
});*/

