<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videojuego extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'lanzamiento',
        'desarrolladora_id'
    ];

    protected $casts = [
        'lanzamiento' =>  'datetime',
    ];


    public function getLanzamientoFormateadoAttribute(){
        return $this->lanzamiento
        ->locale("es")
        ->timezone("Europe/Madrid")
        ->translatedFormat('d \d\e F \d\e Y');
    }
    public function getPrecioFormateadoAttribute(){
        $formatter = new \NumberFormatter('es_ES', \NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($this->precio,"EUR");
    }

    public function desarrolladora(){
        return $this->belongsTo(Desarrolladora::class);
    }

    public function editora():BelongsTo{
        return $this->desarrolladora()->editora();
    }

    public function generos(){
        return $this->belongsToMany(Genero::class)->withTimestamps()->orderBy('genero');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }
}
