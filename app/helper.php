<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

if(!function_exists('dinero')){
    function dinero($valor){
        $formatter = new \NumberFormatter('es_ES', \NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($valor,"EUR");
    }

}


if(!function_exists('fecha')){
    function fecha(Carbon $fecha){
        return $fecha
            ->locale('es')
            ->timezone('Europe/Madrid')
            ->translatedFormat('d \d\e F \d\e Y');
    }
}



if(!function_exists('imagen_path_absoluta')){
    function imagen_path_absoluta(string $nombre_archivo){
        return Storage::disk('public')->path(imagen_path_relativa($nombre_archivo));
    }
}


if(!function_exists('imagen_path_relativa')){
    function imagen_path_relativa(string $nombre_archivo){
        return 'imagenes/' . $nombre_archivo;
    }
}

if (!function_exists('imagen_url_absoluta')) {
    function imagen_url_absoluta(string $nombreArchivo): string
    {
        return Storage::disk('public')->url(imagen_path_relativa($nombreArchivo));
    }
}




if (!function_exists('imagen_url_relativa')) {


    function imagen_url_relativa(string $nombreArchivo): string
    {
        return Storage::url(imagen_path_relativa($nombreArchivo));
    }
}
