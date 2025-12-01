<?php

use App\Http\Controllers\EditoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Cliente;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/clientes',function (){ //Ver clientes
    return view('clientes.index',[
        'clientes' => Cliente::all(),
    ]);

})->name('clientes.index');

Route::get('/clientes/create',function (){ //Create
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


Route::delete('/clientes/{cliente}', function (Cliente $cliente) { //Delete
    $cliente->delete();
    return redirect('/clientes');
});

Route::post('/clientes',function(Request $request){
    $request->validate([
        'dni' => 'required|max:9|unique:clientes', //En el caso de que el nombre del campo del formulario no coincida con el nombre de la tabla, entonces ponemos unique:clientes,dni
        'nombre' => 'required|max:255',
        'apellidos' => 'max:255',
        'direccion' => 'max:255',
        'codpostal' => 'nullable|numeric|decimal:0|digits:5',
        'telefono' => 'nullable|max:9'

    ]);
    Cliente::create($request ->input());
    return redirect('/clientes');
});


Route::get('/clientes/{cliente}',function(Cliente $cliente){ //Modificar
    return view('clientes.edit',[
        'cliente' => $cliente //Como es un Modelo/Objeto le pasamos el cliente directamente para que nos muestre TODO
    ]);
});

Route::put('clientes/{cliente}', function (Cliente $cliente,Request $request) { //Update
    $validated = $request->validate([
        'dni' => 'required|max:9|unique:clientes,dni,' . $cliente -> id, //En este caso ponemos esto para que el dni no nos de error
        //ya que obviamente el dni está pillado porque nosotros estamos modificando
        'nombre' => 'required|max:255',
        'apellidos' => 'max:255',
        'direccion' => 'max:255',
        'codpostal' => 'nullable|numeric|decimal:0|digits:5',
        'telefono' => 'nullable|max:9'

    ]);
    $cliente->update($validated);
    return redirect('/clientes');
});


// Route::get('/juegos',[VideojuegoController::class,'index']);
//El route::resource que hay abajo es el equivalente a poner 7 routes estas que tenemos aqui
// Route::get('/juegos/create',[VideojuegoController::class,'create']);

Route::resource("videojuegos",VideojuegoController::class);
Route::resource("editoras",EditoraController::class);
Route::resource("generos",GeneroController::class);
Route::post('/videojuegos/{videojuego}/anadir_genero',[VideojuegoController::class,'agregar_genero'])->name('videojuegos.agregar_genero');
Route::delete('videojuegos/{videojuego}/quitar_genero/{genero}',[VideojuegoController::class,'quitar_genero'])->name('videojuegos.quitar_genero');








//Todas estas formas de hacerlo, son "técnicas", podemos usar una fachada, un helper,etc...
/*Route::get('/hola',function (){
    $nombre = request() -> query('nombre'); //Esto es un helper
    return "Hola,$nombre";
});*/
/*Route::get('/hola',function() { //Usamos una fachada(facade), son clases que solo tienen métodos estáticos
    $nombre = Request::query('nombre');
    return "Hola,$nombre";
});*/
