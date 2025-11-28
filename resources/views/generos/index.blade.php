<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <table class="table">
            <thead>
                    <th>Género</th>
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
</div>
</x-app-layout>
