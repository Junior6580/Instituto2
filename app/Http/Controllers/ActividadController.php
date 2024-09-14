<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mostrar_actividades()
    {
        $actividades = Actividad::all();
        return view('colegio.registros.actividades_materias.actividades', compact('actividades'));
    }
    public function nueva_actividad()
    {
        $actividades = Actividad::all();
        return view('colegio.registros.actividades_materias.nueva_actividad', compact('actividades'));
    }

    public function actividad_nueva(Request $request)
    {
        $actividades = new Actividad();
        $actividades->nombre = $request->input('nombre');


        if ($actividades->save()) {
            $actividades = Actividad::all();
            return redirect()->route('mostrar_actividades')->with('success', 'Actividad Registrada Con Exito');
        }
    }
}
