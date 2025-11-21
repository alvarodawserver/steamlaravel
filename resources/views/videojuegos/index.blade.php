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
                    @foreach ($videojuegos as $videojuego)
                    <tr class="bg-neutral-primary border-b border-default">
                        <td>{{ $videojuego->nombre }}</td>
                        <td>{{ $videojuego->precio_formateado }}</td>
                        <td>{{ $videojuego->lanzamiento_formateado }}</td>
                        <td>{{ $videojuego->desarrolladora->denominacion}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
</x-app-layout>
