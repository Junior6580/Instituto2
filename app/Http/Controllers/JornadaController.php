<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornada;

class JornadaController extends Controller
{
    public function mostrar_jornada()
    {
        $jornadas = Jornada::all();
        return view('colegio.registros.grados_jornadas.mostrar_jornada', compact('jornadas'));
    }
    public function nueva_jornada()
    {
        $jornadas = Jornada::all();
        return view('colegio.registros.grados_jornadas.nueva_jornada', compact('jornadas'));
    }

    public function jornada_nueva(Request $request)
    {
        $jornada = new Jornada();
        $jornada->nombre = $request->input('nombre');

        if ($jornada->save()) {
            $jornada = Jornada::all();
            return redirect()->route('mostrar_jornadas')->with('success', 'Calificación guardada exitosamente.');
        }
    }


}
