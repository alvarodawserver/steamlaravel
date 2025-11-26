<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(app()->environment('local')){

            $editora_id = DB::table("editoras")->insertGetId([
                'nombre' => 'Steam',
            ]);

            $desarrolladora_id = DB::table("desarrolladoras")->insertGetId([
                "denominacion" => "Valve",
                "editora_id" => $editora_id
            ]);


            DB::table("videojuegos")->insert([
                [
                "nombre" => "Half Life",
                "precio" => "9.99",
                "lanzamiento" => "1998-11-21",
                "desarrolladora_id" => $desarrolladora_id,
            ],
            [
                "nombre" => "Half Life 2",
                "precio" => "20.00",
                "lanzamiento" => "2012-10-23",
                "desarrolladora_id" => $desarrolladora_id,
            ]]);
        }
    }
}
