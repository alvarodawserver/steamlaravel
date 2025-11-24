<x-app-layout>
    <x-errores />

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

            <label class="floating-label"for="lanzamiento">
            <span>Lanzamiento:</span>
                <input class="input" type="date" id="lanzamiento" name="lanzamiento" value="{{ old('lanzamiento')}}"><br>
            </label>

            <select class="select" name="desarrolladora_id" id="desarrolladora_id">
                @foreach ($desarrolladoras as $desarrolladora )
                    <option value="{{ $desarrolladora->id }}"
                        {{ old($desarrolladora->id) == $desarrolladora->id ? 'selected':'' }}>{{ $desarrolladora->denominacion }}</option>
                @endforeach
            </select>

            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
                <a href="/videojuegos" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
