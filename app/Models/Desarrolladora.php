<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desarrolladora extends Model
{
    protected $fillable = ['denominacion'];
    public function videojuegos(){
        return $this->hasMany(Videojuego::class);
    }
}
