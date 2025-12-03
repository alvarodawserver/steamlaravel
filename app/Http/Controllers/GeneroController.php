<?php

namespace App\Http\Controllers;

use App\Models\Genero;

use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = Genero::orderBy('genero');
        if($busqueda = $request->query('busqueda')){
            $q->whereLike('genero',"%$busqueda%",false);
        }
        return view("generos.index",[
            "generos" => $q->paginate(5)->withQueryString(), //Esto se pone para paginar el indice,a parte,
            // se pone el withQueryString para  guardar los datos del input "busqueda" y que no se pierdan al cambiar de página
            "busqueda" => $busqueda //Le podemos mandar la búsqueda para poder ponerlo en el value
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("generos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "genero" => "required|max:255|unique:generos",
        ]);
        Genero::create($validated);
        return redirect()->route("generos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        //
    }
}
