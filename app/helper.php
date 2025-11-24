<?php

if(!function_exists('dinero')){
    function dinero($valor){
        $formatter = new \NumberFormatter('es_ES', \NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($valor,"EUR");
    }

}


if(!function_exists('fecha')){
    function fecha($fecha){

        return date_format($fecha,"");
    }
}
