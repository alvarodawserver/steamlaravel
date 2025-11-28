<x-app-layout>
    <div class="card bg-base-100 w-96 shadow-sm">
        <figure>
            <img class="rounded-box" width="320" height="200"
                src="resources/videojuegos/hf.png" alt="" />
        </figure>
        <div class="card-body">
            <h2 class="card-tiitle text-3x1">{{ $videojuego->nombre }}</h2>
            <ul class="list bg-base-100 rounded-box shadow-md">

                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Generos</li>
                @foreach ($videojuego->generos as $genero )
                    <div class="text-x">{{ $genero->genero }}</div>
                @endforeach
            </ul>
        </div>
    </div>

</x-app-layout>
