<x-app-layout>
    <x-errores />
    <div class="w-full max-w-sm mx-auto">
        <form action="{{ route("videojuegos.update",$videojuego->id)}}" method="post" class="card bg-base-200 p-6 shadow">
            @method('PUT')
            @csrf
            <label class="floating-label" for="nombre">
               <span>Titulo:</span>
                <input class="input " type="text" id="nombre" name="nombre" value="{{ old('nombre',$videojuego->nombre) }}"><br>
            </label>
            <label class="floating-label" for="precio">
                <span>Precio</span>
                <input class="input" type="text" id="precio" name="precio" value="{{ old('precio', $videojuego -> precio)  }}"><br>
            </label>

            <label class="floating-label" for="lanzamiento">
                <span>Lanzamiento</span>
                <input class="input" type="date" id="lanzamiento" name="lanzamiento" value="{{ old('lanzamiento', $videojuego -> lanzamiento)}}"><br>
            </label>

            <label class="floating-label" for="desarrolladora_id">
                <span>Desarrolladora</span>
                <select class="select select-primary" id="desarrolladora_id" name="desarrolladora_id">
                    @foreach ($desarrolladoras as $d)
                        <option value="{{ $d->id }}" {{ $d->id == old('desarrolladora_id', $videojuego->desarrolladora_id) ? 'selected' : '' }}>
                            {{ $d->denominacion }}
                        </option>
                    @endforeach
                </select>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
                <a href="{{ route("videojuegos.index") }}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
