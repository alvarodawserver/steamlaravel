<?php

@foreach($cuadricula as $hora => $columnasDia)
    <tr>
        <td>{{ $hora }}</td>
        @foreach($columnasDia as $dia => $estado)
            <td>
                @if($estado === 'Libre')
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="dia" value="{{ $dia }}">
                        <input type="hidden" name="hora" value="{{ $hora }}">
                        <button type="submit" style="background: green; color: white;">
                            Reservar
                        </button>
                    </form>
                @else
                    <span style="color: red; font-weight: bold;">Ocupado</span>
                @endif
            </td>
        @endforeach
    </tr>
@endforeach
