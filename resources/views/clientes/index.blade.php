<x-app-layout>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                <th scope="col" class="px-6 py-3 font-medium">DNI</th>
                <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
                <th scope="col" class="px-6 py-3 font-medium">Apellidos</th>
                <th scope="col" class="px-6 py-3 font-medium">Acciones</th>


            </thead>
            <tbody>
                @foreach ($clientes as $cliente )
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="px-6 py-4">{{ $cliente->dni }}</td>
                        <td class="px-6 py-4">{{ $cliente->nombre }}</td>
                        <td class="px-6 py-4">{{ $cliente->apellidos }}</td>
                        <td class="px-6 py-4">
                            <form action="/clientes/{{ $cliente->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Borrar</button>
                            </form>
                            <form action="/cliente/{{$cliente ->id}}">
                                @method('PUT')
                                @csrf
                                <button type="submit">Modificar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
