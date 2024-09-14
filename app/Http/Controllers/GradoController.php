<?php

namespace App\Http\Controllers;
use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
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
    public function grados()
    {
        $grados = Grado::all();
        return view('colegio.registros.grados_jornadas.grados', compact('grados'));
    }
    public function nuevo_grado()
    {
        $grados = Grado::all();
        return view('colegio.registros.grados_jornadas.nuevo_grado', compact('grados'));
    }

    public function grado_nuevo(Request $request)
    {
        $grados = new Grado();
        $grados->nombre = $request->input('nombre');

        if ($grados->save()) {
            $grados = Grado::all();
            return redirect()->route('grados')->with('success', 'Grado Registrado Con Exito');
        }
    }
}
