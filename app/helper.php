<?php



function dinero($valor){
    $formatter = new \NumberFormatter('es_ES', \NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($valor,"EUR");

}

function fecha($fecha){

    return date_format($fecha,"");
}
