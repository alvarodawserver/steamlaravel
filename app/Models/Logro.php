<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $fillable = [
        'descripcion',
        'videojuego_id',
    ];

    public function videojuego(){
        return $this->belongsTo(Videojuego::class);
    }


    public function users(){
        return $this->belongsToMany(User::class);
    }
}

