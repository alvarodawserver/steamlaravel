<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <form action="{{ route('generos.index') }}" method="get">
            <div class="flex gap-3">
                <label class="floating-label" for="busqueda">
                    <span>Buscador</span>
                    <input class="input input-md" type="text" name="busqueda" id="busqueda"
                        value="{{ $busqueda }}">
                </label>
                <button class="btn btn-active" type="submit">Buscar</button>
                <a class="btn btn-ghost" href="{{ route('generos.index')}}">Limpiar</a>
            </div>
        </form>
        <table class="table">
            <thead>
                    <th>
                        <a class="btn btn-ghost" href="{{request()->fullUrlWithQuery(['sentido' => 'ASC'])}}">Género</a>
                    </th>
                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                    <tr class="bg-neutral-primary border-b border-default">
                        <td>{{ $genero->genero }}</td>
                        <td><a href="{{ route("generos.destroy",$genero->id) }}">Borrar</a></td>
                        <td><a href="{{ route("generos.edit",$genero->id) }}">Modificar</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{$generos->links()}}
        <button class="btn btn-soft btn-info">Crear género</button>
    </div>
</x-app-layout>
