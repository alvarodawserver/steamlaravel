<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $fillable = ['nombre'];

    public function desarrolladoras(){
        return $this->hasMany(Desarrolladora::class);
    }

    public function videojuegos(){
        return $this->hasManyThrough(Videojuego::class,Desarrolladora::class);
    }
}
