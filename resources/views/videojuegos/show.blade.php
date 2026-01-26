<x-app-layout>
    <div class="card bg-base-100 w-96 shadow-sm">
        <figure class="p-4">

            <img width="300" height="150" alt="" src="{{ $videojuego->getImageUrlAttribute() }}"/>
        </figure>
        <div class="card-body">
            <h2 class="card-tiitle text-3x1">{{ $videojuego->nombre }}</h2>
            <ul class="list bg-base-100 rounded-box shadow-md">

                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Generos</li>
                @foreach ($videojuego->generos as $genero )
                    <div class="text-x">{{ $genero->genero }}</div>
                    @auth

                    <form action="{{ route("videojuegos.quitar_genero",['videojuego' => $videojuego, 'genero' => $genero])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-soft btn-success" type="submit">Borrar</button>
                    </form>
                    @endauth
                @endforeach
            </ul>
        </div>



        @auth
        <h2 class="text-2x1 font-bold mb-3">Insertar un genero</h2>
            @if ($otros_generos->isNotEmpty())
            <form action="{{ route('videojuegos.agregar_genero',$videojuego) }}" method="post" class="card bg-base-200 p-6 shadow">
                @csrf
                <select class="select select-primary" id="genero_id" name="genero_id">
                    @foreach ($otros_generos as $otro_genero)
                    <option value="{{ $otro_genero->id }}">{{ $otro_genero->genero}}</option>
                    @endforeach
                </select>

                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
            </form>
            @endif
        @endauth


    </div>

</x-app-layout>
