<x-app-layout>
    <div class="card bg-base-100 w-96 shadow-sm">
        <div class="card-body">
            <h2 class="card-tiitle text-3x1">{{$user->name}}</h2>
            <ul class="list bg-base-100 rounded-box shadow-md">

                @foreach ($user->videojuegos as $videojuego)
                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Videojuegos</li>
                <div class="text-x">{{$videojuego->nombre }}</div>
                @endforeach

                @foreach ($user->hardware as $hardware)
                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Hardware</li>
                    <div class="text-x">{{$hardware->nombre }}</div>
                @endforeach
            </ul>
        </div>



    </div>

</x-app-layout>
