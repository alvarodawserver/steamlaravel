<x-app-layout>
    <x-errores/>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <table class="table">
            <thead>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Lanzamiento</th>
                    <th>Desarrolladora</th>
                    @auth
                        <th colspan="2">Acciones</th>
                    @endauth
                </thead>
                <tbody>
                    @foreach ($videojuegos as $videojuego)
                    <tr class="bg-neutral-primary border-b border-default">
                        <td>
                            <a class="link link-primary" href="{{ route("videojuegos.show",$videojuego) }}">
                                {{ $videojuego->nombre }}
                            </a>
                        </td>
                        <td>{{ $videojuego->precio_formateado }}</td>
                        <td>{{ $videojuego->lanzamiento_formateado }}</td>
                        <td>{{ $videojuego->desarrolladora->denominacion}}</td>
                        <td>
                            @can('delete',$videojuego)
                                <form action="{{ route('videojuegos.destroy',$videojuego) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-ghost btn-error" onclick="return confirm('¿Está seguro que desea eliminar el juego?')">Eliminar</button>
                                </form>
                            @endcan
                            @can('update',$videojuego)
                                <a class="btn btn-sm btn-ghost btn-info" href="{{ route('videojuegos.edit', $videojuego) }}">Editar</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        @auth
            @can('videojuego-create')
                <a class="btn btn-ghost btn-primary" href="{{ route('videojuegos.create') }}">Dar de alta a un nuevo videojuego</a>
            @endcan
        @endauth
</div>
</x-app-layout>
