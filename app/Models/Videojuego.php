<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    public function desarrolladora(){
        return $this->hasOne(Desarrolladora::class);
    }
}
