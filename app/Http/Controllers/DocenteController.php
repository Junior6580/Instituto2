<?php

namespace App\Http\Controllers;

use App\Models\Docente; //
use App\Models\Grado;
use App\Models\Persona;
use App\Models\Jornada;
use Illuminate\Http\Request;

class DocenteController extends Controller
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
    public function mostrardocentes()
    {
        $personas = Persona::all();
        $docentes = Docente::all();
        $jornadas = Jornada::all();
         return view('colegio.docentes.docentes', compact('docentes', 'personas', 'jornadas'));

    }

    public function getdocenteodd()
    {
        $docentes = Docente::get();
        $personas = Persona::all();
        $jornadas = Jornada::all();
        $data = ['docentes'=>$docentes,'personas'=>$personas,'jornadas'=>$jornadas];
        return view('colegio.docentes.odd',$data);
    }

    public function postdocenteodd(Request $request)
    {
        $request->validate(Docente::rules());
        $docente = new Docente();
        $docente->persona_id = $request->input('persona_id');
        $docente->jornada_id = $request->input('jornada_id');
        if ($docente->save()) {
            $docentes = Docente::all();
            $personas = Persona::all();
            $data = ['docentes'=>$docentes,'personas'=>$personas];
            return redirect()->route('mostrardocentes', $data)->with('success', 'Docente Agregado Exitosamente');
        }
    }

    public function docentes(Request $request)
{
    $personas = Persona::all();
    $persona_id = $personas->pluck('persona_id')->toArray();
    $docentes = Docente::whereIn('id', $persona_id)->get();

    return view('colegio.docentes.docentes', [
        'docentes' => $docentes,
        'personas' => $personas
    ]);
}
    public function getdocenteedot($id)
    {
        $docentes = Docente::get();
        $personas = Persona::all();
        $jornadas = Jornada::all();
        $docente = Docente::findOrFail($id);
        $data = ['docente'=>$docente,'docentes'=>$docentes,'personas'=>$personas,'jornadas'=>$jornadas];

        return view('colegio.docentes.edot',$data);
    }
    public function postdocenteedot(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->persona_id = $request->input('persona_id');
        $docente->jornada_id = $request->input('jornada_id');
        if($docente->save()){
            $docentes = Docente::get();
        $personas = Persona::all();
        $jornadas = Jornada::all();
        $data = ['docente'=>$docente,'docentes'=>$docentes,'personas'=>$personas,'jornadas'=>$jornadas];
        return redirect()->route('mostrardocentes', $data)->with('success', 'Docente actualizado correctamente');
    }
    }
    public function getdocentedelete($id)
{
    // Buscar la persona por ID
    $docente = Docente::find($id);

    // Verificar si la persona existe
    if ($docente) {
        $personas = Persona::all();
        $docentes = Docente::get();
        $jornadas = Jornada::all();
        $docente->delete();
        $data = ['docente'=>$docente,'docentes'=>$docentes,'personas'=>$personas,'jornadas'=>$jornadas];
        return redirect()->route('mostrardocentes', $data)->with('success', 'Docente Eliminado Exitosamente');
    } else {
        return response()->json(['message' => 'No se encontró la persona'], 404);
    }
}
}
