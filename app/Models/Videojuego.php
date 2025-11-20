<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $fillable = ['titulo','precio','lanzamiento','desarrolladora_id'];
    public function desarrolladora(){
        return $this->hasOne(Desarrolladora::class);
    }
}
