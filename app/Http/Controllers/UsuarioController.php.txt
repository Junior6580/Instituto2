<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
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
    public function json(){

        $usuarios = Usuario::all();
        return response()->json($usuarios);}

    public function calificacion(){
        $usuarios = Usuario::where('rol', 'aprendiz')->get();
        return view('calificacion.index',['usuarios'=>$usuarios]);
    }
}
