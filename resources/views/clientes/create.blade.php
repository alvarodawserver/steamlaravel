<x-app-layout>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

    <form action="/clientes/create" method="post">
        @csrf
        <label for="dni">DNI:*</label>
        <input type="text" id="dni" name="dni" value=""><br>

        <label for="nombre">Nombre:*</label>
        <input type="text" id="nombre" name="nombre" value=""><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value=""><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value=""><br>

        <label for="codpostal">Código postal: </label>
        <input type="text" id="codpostal" name="codpostal" value=""><br>

        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono" value=""><br>

        <button type="submit">Insertar</button>
    </form>
</x-app-layout>
