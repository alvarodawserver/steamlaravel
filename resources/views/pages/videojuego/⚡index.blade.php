<?php

use Livewire\Component;
use App\Models\Videojuego;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use App\Models\Desarrolladora;
new class extends Component
{
    public ?Videojuego $videojuego = null;

    #[Validate('required|string|max:255')]
    public string $nombre = '';

    #[Validate('required|decimal:2|gte:-999999.99|lte:999999.99')]
    public ?int $precio = null;

    #[Validate('required|date')]
    public ?string $lanzamiento = null;

    #[Validate('required|exists:desarrolladoras,id')]
    public ?int $desarrolladora_id = null;


    public bool $esEditar = false;

    public $modal = false;

    #[Computed]
    public function videojuegos(){
        return Videojuego::all();
    }
    #[Computed]
    public function desarrolladoras(){
        return Desarrolladora::all();
    }

    public function editar($id)
    {
        $videojuego = Videojuego::find($id);

        if ($videojuego !== null) {
            // Lógica para cargar los datos de la videojuego en el formulario de edición
            $this->videojuego = $videojuego;
            $this->nombre = $videojuego->nombre;
            $this->precio = $videojuego->precio;
            $this->lanzamiento = $videojuego->lanzamiento;
            $this->desarrolladora_id = $videojuego->desarrolladora_id;
            $this->modal = true;
            $this->esEditar = true;
        }
    }

    public function createUpdate()
    {
        $this->validate();
        if ($this->videojuego === null) {
            Videojuego::create([
                'nombre' => $this->nombre,
                'precio' => $this->precio,
                'lanzamiento' => $this->lanzamiento,
                'desarrolladora_id' => $this->desarrolladora_id,
            ]);
        } else {
            $this->videojuego->nombre = $this->nombre;
            $this->videojuego->precio = $this->precio;
            $this->videojuego->lanzamiento = $this->lanzamiento;
            $this->videojuego->desarrolladora_id = $this->desarrolladora_id;
            $this->videojuego->save();
        }
        $this->resetFormulario();
    }

    public function resetFormulario()
    {
        $this->videojuego = null;
        $this->nombre = '';
        $this->precio = null;
        $this->lanzamiento = null;
        $this->modal = false;
    }

    public function eliminar($id)
    {
        $videojuego = Videojuego::find($id);

        if ($videojuego !== null) {
            $videojuego->delete();
        }
    }

    public function crear()
    {
        $this->resetFormulario();
        $this->modal = true;
        $this->esEditar = false;
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
                                <button type="submit" class="btn btn-sm btn-ghost btn-error" wire:click="eliminar({{ $videojuego->id }})" onclick="return confirm('¿Está seguro que desea eliminar el juego?')">Eliminar</button>

                                <a class="btn btn-sm btn-ghost btn-info" href="#" wire:click="editar({{ $videojuego->id }})">Editar</a>

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



        <!-- Formulario de creación y edición de videojuegos -->
        <div class="w-full max-w-sm mx-auto" wire:show="modal">
            <h2 class="text-2xl font-bold mb-3">{{ $esEditar ? 'Editar un juego' : 'Crear un juego' }}</h2>

            <form class="card bg-base-200 p-6 shadow" wire:submit.prevent="createUpdate">
                <label for="nombre" class="floating-label">
                    <span>Nombre:*</span>
                    <input class="input" type="text" id="nombre"
                        name="nombre" wire:model="nombre">
                    @error('nombre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label for="precio" class="floating-label">
                    <span>Precio:*</span>
                    <input class="input" type="text" id="precio"
                        name="precio" wire:model="precio">
                    @error('precio')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label for="lanzamiento" class="floating-label">
                    <span>Lanzamiento:*</span>
                    <input class="input" type="text" id="lanzamiento"
                        name="lanzamiento" wire:model="lanzamiento">
                    @error('lanzamiento')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label for="desarrolladora_id" class="floating-label">
                    <span>Desarrolladora:*</span>
                    <select class="select" name="desarrolladora_id" id="desarrolladora_id" wire:model="desarrolladora_id">
                        @foreach ($this->desarrolladoras as $desarrolladora )
                            <option value="{{ $desarrolladora->id }}">{{$desarrolladora->denominacion}}</option>
                        @endforeach
                    </select>
                    @error('desarrolladora_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>
                <div class="flex-2 mt-2">
                    <button
                        class="btn btn-soft btn-success"
                        type="submit">{{ $esEditar ? 'Editar' : 'Crear' }}</button>
                    <button
                        class="btn btn-soft btn-error"
                        type="button"
                        wire:click="resetFormulario">Cancelar</button>
                </div>
            </form>
        </div>
</div>
