<x-app-layout>
    <x-errores />

    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2x1 font-bold mb-3">Insertar un videojuego</h2>
        <form action="{{ route("generos.store") }}" method="post" class="card bg-base-200 p-6 shadow">
            @csrf
            <label class="floating-label"for="genero">
                <span>Genero</span>
                <input class="input input-md" type="text" id="genero" name="genero" value="{{ old('nombre') }}"><br>
            </label>

            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
                <a href="{{ route('generos.index') }}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
