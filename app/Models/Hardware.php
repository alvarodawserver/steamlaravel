<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $table = 'hardware';//Esto sirve para que no se líe con los plurales


    public function users(){
        return $this->morphToMany(User::class,'adquirible');
    }

}
