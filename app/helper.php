<?php

use Illuminate\Support\Carbon;

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
