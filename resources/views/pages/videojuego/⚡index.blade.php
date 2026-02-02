<?php

use Livewire\Component;
use App\Models\Videojuego;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

new class extends Component
{
    public ?Videojuego $videojuego = null;

    #[Validate('required|string|max:255')]
    public string $nombre = '';

    #[Validate('required|decimal:2|gte:-999999.99|lte:999999.99')]
    public ?int $precio = null;

    #[Validate('required|date')]
    public ?date $lanzamiento = null;

    #[Validate('required|exists:desarrolladoras,id')]
    public ?int $desarrolladora_id = null;


    public bool $esEditar = false;

    #[Computed]
    public function videojuegos(){
        return Videojuego::all();
    }



};
?>

<div>
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
                        @foreach ($this->videojuegos as $videojuego)
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
</div>
