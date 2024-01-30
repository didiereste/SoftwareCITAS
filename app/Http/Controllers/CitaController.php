<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Horario;
use App\Models\TipoVehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{

    public function index()
    {
        $tiposvehiculos = TipoVehiculo::all();
        $horarios=Horario::all();
        return view('clientes.cita', compact('tiposvehiculos', 'horarios'));
    }


    public function pedircita(Request $request)
    {
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');

        $fecha_hora_string = $fecha . ' ' . $hora;
        $fecha_hora = Carbon::parse($fecha_hora_string)->setTimezone('America/Bogota');
        $fecha_actual = Carbon::now('America/Bogota');

        if ($fecha_hora < $fecha_actual) {
            return response()->json(['error' => 'La fecha no puede ser inferior a la actual']);
        }

        $nombre_dia = $fecha_hora->format('l');

        $horario = Horario::where('dia_semana', $nombre_dia)
            ->first();

        if (!$horario) {
            return response()->json(['error' => 'El taller no trabaja el dia señalado']);
        }

        $duracionCita = Horario::where('dia_semana', 'Monday')
            ->first();
        $duracionCita2 = $duracionCita->duracion_cita;

        $horaCita = $fecha_hora->format('H:i:s');
        $horaInicio = $duracionCita->hora_inicio;
        $horaFin = $duracionCita->hora_fin;

        if ($horaCita >= $horaInicio && $horaCita <= $horaFin) {
            $citaExistente = Cita::where('fecha_inicio_cita', '<=', $fecha_hora)
                                   ->where('fecha_fin_cita', '>=', $fecha_hora)
                                   ->exists();

            if ($citaExistente) {
                return response()->json(['error' => 'La cita solicitada ya está programada']);
            }
            $fecha_fin_cita = $fecha_hora->copy()->addMinutes($duracionCita2);

            $cita = new Cita();

            $cita->nombre_propie = $request->input('nombre_propie');
            $cita->placa = $request->input('placa');
            $cita->cilindraje = $request->input('cilindraje');
            $cita->servicio = $request->input('servicio');
            $cita->descripcion = $request->input('descripcion');
            $cita->user_id = Auth::id();
            $cita->fecha_inicio_cita = $fecha_hora;
            $cita->fecha_fin_cita = $fecha_fin_cita;
            $cita->tipo_vehiculo = $request->input('tipo_vehiculo');

            $cita->save();

            return response()->json(['exito' => 'cita guardada correctamente']);
        } else {
            return response()->json(['error' => 'La hora señalada no está disponible']);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
