<?php
namespace App\Http\Controllers;
public function index() {
    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
    $horas = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

    // Traemos todas las reservas de la semana
    $reservas = Appointment::all();

    $cuadricula = [];
    foreach ($horas as $hora) {
        foreach ($dias as $dia) {
            // Buscamos si hay una reserva para este día y hora
            $reserva = $reservas->where('dia', $dia)->where('hora', $hora)->first();

            // Si existe, guardamos el objeto; si no, ponemos null o "Libre"
            $cuadricula[$hora][$dia] = $reserva ? 'Ocupado' : 'Libre';
        }
    }

    return view('reservas.index', compact('cuadricula', 'dias'));
}
