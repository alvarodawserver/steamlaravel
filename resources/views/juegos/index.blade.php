<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <table class="table">
            <thead>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Lanzamiento</th>
                    <th>Desarrolladora</th>
                </thead>
                <tbody>
                    @foreach ($juegos as $juego)
                    <tr class="bg-neutral-primary border-b border-default">
                        <td>{{ $juego->titulo }}</td>
                        <td>{{ $juego->precio }}</td>
                        <td>{{ $juego->lanzamiento }}</td>
                        <td>{{ $juego->desarrolladora_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
</x-app-layout>