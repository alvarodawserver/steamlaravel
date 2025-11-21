<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
