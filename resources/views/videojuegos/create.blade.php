<x-app-layout>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div role="alert" class="alert alert-error mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $error }}</span>
        </div>
        @endforeach
    @endif



    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2x1 font-bold mb-3">Insertar un videojuego</h2>
        <form action="/videojuegos" method="post" class="card bg-base-200 p-6 shadow">
            @csrf
            <label class="floating-label"for="nombre">
                <span>Nombre</span>
                <input class="input input-md" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br>
            </label>

            <label class="floating-label" for="precio">
                <span>Precio</span>
                <input class="input"type="text" id="precio" name="precio" value="{{ old('precio')  }}"><br>
            </label>

            <label class="floating-label" for="lanzamiento">
            <span>Lanzamiento:</span>
                <input class="input" type="text" id="lanzamiento" name="lanzamiento" value="{{ old('lanzamiento')}}"><br>
            </label>

            <label class="floating-label" for="desarrolladora_id">
                <span>Desarrolladora:</span>
                <input class="input" type="text" id="desarrolladora_id" name="desarrolladora_id" value="{{ old('desarrolladora_id')}}"><br>
            </label>

            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
                <a href="/videojuegos" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
