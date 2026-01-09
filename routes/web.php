<?php
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Cliente;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

//Esto es para que al entrar al localhost:8000 nos mande directamente a los juegos
Route::redirect('/',route('videojuegos.index'));

Route::get('users/ver_perfil/1',[UserController::class,'ver_perfil'])->name('users.ver_perfil');








//Todas estas formas de hacerlo, son "técnicas", podemos usar una fachada, un helper,etc...
/*Route::get('/hola',function (){
    $nombre = request() -> query('nombre'); //Esto es un helper
    return "Hola,$nombre";
});*/
/*Route::get('/hola',function() { //Usamos una fachada(facade), son clases que solo tienen métodos estáticos
    $nombre = Request::query('nombre');
    return "Hola,$nombre";
});*/


Route::get("/", function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
