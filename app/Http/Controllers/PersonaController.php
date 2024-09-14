<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //
use App\Models\Persona;
use Spatie\Permission\Models\Role; //



class PersonaController extends Controller
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

    //Asignar roles llamando el subnombre de la persona registrada
    public function asignar_rol(User $user)
    {


        $roles = Role::all();
        return view('colegio.usuarios.asignar_rol', compact('user', 'roles'));
    }
    public function rol_asignado(Request $request, User $user)
    {
        $selectedRoleId = $request->input('selected_role');

        if (!empty($selectedRoleId)) {
            $selectedRole = Role::find($selectedRoleId);

            if ($selectedRole) {
                $user->syncRoles([$selectedRole->id]);
                return redirect()->route('mostrarpersonas')->with('success', 'Se asignó el rol correctamente');
            }
        }

        return redirect()->route('mostrarpersonas')->with('error', 'Error al asignar el rol');
    }








    //crear usuarios llamando el id y el nombre de la persona registrada.
    public function mostrarpersonas()
    {
        $personas = Persona::all();
        $users = User::all();
        return view('colegio.usuarios.usuarios', compact('users', 'personas'));
    }
    public function nuevo_usuario()
    {
        $user = User::get();
        $personas = Persona::all();
        $data = ['personas' => $personas, 'user' => $user];
        return view('colegio.usuarios.nuevo_usuario', $data);
    }

    public function usuario_nuevo(Request $request)
    {
        $user = new User();
        $user->subnombre = $request->input('subnombre');
        $user->persona_id = $request->input('persona_id');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        if ($user->save())
            $users = User::all(); {
            return view('colegio.usuarios.usuarios', compact('users'));
        }
    }
    public function usuarios(Request $request)
    {
        $personas = Persona::all();
        $persona_id = $personas->pluck('persona_id')->toArray();
        $users = User::whereIn('id', $persona_id)->get();

        return view('colegio.usuarios.usuarios', [
            'users' => $users,
            'personas' => $personas
        ]);
    }





    //mostrar personas en el datatable
    public function personas()
    {
        $personas = Persona::all();
        return view('colegio.usuarios.personas', compact('personas'));
    }
}
