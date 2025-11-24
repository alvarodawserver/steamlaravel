<x-app-layout>
    <x-errores />
@endif
    <div class="w-full max-w-sm mx-auto">
        <form action="/clientes/{{ $cliente->id }}" method="post" class="card bg-base-200 p-6 shadow">
            @method('PUT')
            @csrf
            <label class="floating-label" for="dni">
               <span>DNI:*</span>
                <input class="input " type="text" id="dni" name="dni" value="{{ old('dni',$cliente->dni) }}"><br>
            </label>
            <label class="floating-label" for="nombre">
                <span>Nombre:*</span>
                <input class="input" type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente -> nombre)  }}"><br>
            </label>

            <label class="floating-label" for="apellidos">
                <span>Apellidos:</span>
                <input class="input" type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $cliente -> apellidos)}}"><br>
            </label>

            <label class="floating-label" for="direccion">
                <span>Dirección:</span>
                <input class="input" type="text" id="direccion" name="direccion" value="{{ old('direccion', $cliente -> direccion)}}"><br>
            </label>

            <label class="floating-label" for="codpostal">
                <span>Código postal:</span>
                <input class="input" type="text" id="codpostal" name="codpostal" value="{{ old('codpostal', $cliente -> codpostal)}}"><br>
            </label>

            <label class="floating-label" for="telefono">Teléfono:
                <input class="input" type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente -> telefono)}}"><br>
            </label>

            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Modificar</button>
                <a href="/clientes" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
