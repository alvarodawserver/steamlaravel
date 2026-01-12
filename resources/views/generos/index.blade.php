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
                        @php
                            $sentido = $sentido == 'asc'?'desc':'asc';
                            $flecha = $sentido == 'asc' ? '↑': '↓'
                        @endphp
                        <a class="btn btn-ghost" href="{{request()->fullUrlWithQuery(['sentido' => $sentido])}}">Género{{ $flecha }}</a>
                    </th>
                    @auth
                        <th colspan="2">Acciones</th>
                    @endauth
                </thead>
                <tbody>

                    @foreach ($generos as $genero)
                    <tr class="bg-neutral-primary border-b border-default">
                        <td>{{ $genero->genero }}</td>
                        @auth
                        <td>

                            <form action="{{ route('generos.destroy',$genero->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-error" type="submit">Borrar</button>
                            </form>
                        </td>
                        <td><a href="{{ route("generos.edit",$genero->id) }}">Modificar</a></td>
                        @endauth
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{$generos->links()}}
        @auth
        <button class="btn btn-soft btn-info">Crear género</button>
        @endauth
    </div>
</x-app-layout>
