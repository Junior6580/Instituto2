<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Materia;
use App\Models\Grado;

class HorarioController extends Controller
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
    public function nuevo_horario()
    {
        $materias = Materia::all();
        $grados = Grado::all();
        return view('colegio.horarios.horarios', compact('materias', 'grados'));
    }

    public function store(Request $request, Horario $horarios)
    {

        $request->validate([
            'dia_de_la_semana' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'materia_id' => 'required',
        ]);

        $horarios = Horario::create($request->all());

        return redirect()->route('mostrarhorarios')
            ->with('success', 'Horario Creado Correctamente');
    }

    public function mostrarhorarios()
    {
        $grados = Grado::all();
        $materias = Materia::all();
        $horarios = Horario::all();
        return view('colegio.horarios.mostrar_horarios', compact('horarios', 'materias', 'grados'));
    }
    public function filtro(Request $request)
    {
        $grados = Grado::all();
        $grado_id = $request->input('grado_id');
        $horarios = Horario::where('grado_id', $grado_id)->get();
        $materias = Materia::all();

        return view('colegio.horarios.mostrar_horarios', compact('horarios', 'materias', 'grado_id', 'grados'));
    }

    public function gethorarioedit($id)
    {


        $horario = Horario::find($id);

        $materias = Materia::all();
        $grados = Grado::all();

        return view('colegio.horarios.editar_horarios', compact('horario', 'materias', 'grados'));


    }

    public function puthorarioedit(Request $request, $id)
    {
        $horario = Horario::find($id);

        $horario->dia_de_la_semana = $request->input('dia_de_la_semana');
        $horario->hora_inicio = $request->input('hora_inicio');
        $horario->hora_fin = $request->input('hora_fin');
        $horario->materia_id = $request->input('materia_id');
        $horario->grado_id = $request->input('grado_id');
        $horario->save();

        return redirect()->route('mostrarhorarios')->with('success', 'Horario Modificado Correctamente');
    }

    public function eliminar_horarios($id)
    {
        $horario = Horario::find($id);

        if ($horario) {
            $grados = Grado::all();
            $materias = Materia::all();
            $horario->delete();
            $data = ['horario' => $horario, 'materias' => $materias, 'grados' => $grados];
            return redirect()->route('mostrarhorarios', $data)->with('success', 'Horario Eliminado Con Exito!!');
        } else {
            return response()->json(['message' => 'No se encontró la persona'], 404);
        }
    }


}
