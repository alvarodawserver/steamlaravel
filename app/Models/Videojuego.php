<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Videojuego extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nombre',
        'precio',
        'lanzamiento',
        'desarrolladora_id',
        'imagen'
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
        return $this->morphToMany(User::class,'adquirible');
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public static function rules():array
    {
        return [
            'nombre' => 'required|max:255',
            'precio' => 'required|decimal:2|gte:-999999.99|lte:999999.99',
            'lanzamiento' => 'required|date',
            'desarrolladora_id' => 'required|exists:desarrolladoras,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
    }

    public function getImageUrlAttribute()
    {
        // asset("storage/videojuegos/" . $videojuego->imagen)
        return imagen_url_relativa($this->imagen);
    }
}
