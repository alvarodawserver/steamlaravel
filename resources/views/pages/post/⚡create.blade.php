<?php

use Livewire\Component;

new class extends Component
{
    public int $contador = 0;

    public string $texto = '';

    public function incrementar()
    {
        $this->contador++;
    }

    public function resetear(){
        $this->contador = 0;
    }

    public function mayusculas(){
        $this->texto = mb_strtoupper($this->texto);
    }
};
?>

<div>
    <h1 class="text-2x1 font-bold mb-3">Contador:{{ $contador }}</h1>
    <button wire:click="incrementar" class="btn btn-primary">Incrementar</button>
    <button wire:click="resetear" class="btn btn-error">Resetear</button>

    <input type="text" wire:model.live="texto" wire:blur="mayusculas" class="input mt-4" placeholder="Escribe algo aquí" >
    <div class="mt-4">
        <strong>Texto en mayúsculas:</strong>{{ $texto }}
    </div>

</div>

{{-- <form wire:submit="save"> <!-- Lo que hace el wire:submit es que cuando le de al boton lo que hace es darle al save() de la clase !-->
    <label>
        Title
        <input class="input" type="text" wire:model="title">
        @error('title') <span style="color: red;">{{ $message }}</span> @enderror
    </label>

    <label >
        Content
        <textarea class="textarea" wire:model="content" rows="5"></textarea>
        @error('content') <span style="color: red;">{{ $message }}</span> @enderror
    </label>

    <button type="submit" class="btn btn-success">Save Post</button>
</form> --}}
