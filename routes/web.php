<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');

//Ruta de grados: solo vista
Route::get('/Grados', [App\Http\Controllers\GradoController::class, 'grados'])->middleware('can:grados')->name('grados');
Route::get('/Grados/Nuevo', [App\Http\Controllers\GradoController::class, 'nuevo_grado'])->middleware('can:grados')->name('nuevo_grado');
Route::post('/Grados/Nuevo', [App\Http\Controllers\GradoController::class, 'grado_nuevo'])->middleware('can:grados')->name('grado_nuevo');

//Rutas de alumnos: vista, agregar, editar y eliminar
Route::get('/Alumnos', [App\Http\Controllers\AlumnoController::class, 'alumnos'])->middleware('can:alumnos')->name('alumnos');
Route::get('/Alumnos', [App\Http\Controllers\ColegioController::class, 'mostrar_grado_alumnos'])->middleware('can:alumnos')->name('mostrar_grado_alumnos');
Route::get('/Alumnos', [App\Http\Controllers\ColegioController::class, 'mostrar_jornada_alumnos'])->middleware('can:alumnos')->name('mostrar_jornada_alumnos');
Route::get('/Alumnos', [App\Http\Controllers\AlumnoController::class, 'mostraralumnos'])->middleware('can:alumnos')->name('mostraralumnos');
Route::get('/Alumnos/Nuevo', [App\Http\Controllers\AlumnoController::class, 'getalumnoadd'])->middleware('can:getalumnoadd')->name('colegio.alumno.add');
Route::post('/Alumnos/Nuevo', [App\Http\Controllers\AlumnoController::class, 'postalumnoadd'])->middleware('can:postalumnoadd')->name('colegio.alumno.add');
Route::get('/Alumnos/Edit/{id}', [App\Http\Controllers\AlumnoController::class, 'getalumnoedit'])->middleware('can:colegio.alumno.edit')->name('colegio.alumno.edit');
Route::put('/Alumnos/{id}', [App\Http\Controllers\AlumnoController::class, 'postalumnoedit'])->middleware('can:postalumnoedit')->name('postalumnoedit');
Route::delete('/Alumnos/delete/{id}', [App\Http\Controllers\AlumnoController::class, 'getalumnodelete'])->middleware('can:colegio.alumno.delete')->name('colegio.alumno.delete');

//Rutas de docente: vista, agregar, editar y eliminar
Route::get('/Docentes', [App\Http\Controllers\DocenteController::class, 'docentes'])->middleware('can:docentes')->name('docentes');
Route::get('/Docentes', [App\Http\Controllers\ColegioController::class, 'mostrar_jornada_docentes'])->middleware('can:docentes')->name('mostrar_jornada_docentes');
Route::get('/Docentes', [App\Http\Controllers\DocenteController::class, 'mostrardocentes'])->middleware('can:docentes')->name('mostrardocentes');
Route::get('/Docentes/Nuevo', [App\Http\Controllers\DocenteController::class, 'getdocenteodd'])->middleware('can:getdocenteodd')->name('getdocenteodd');
Route::post('/Docentes/Nuevo', [App\Http\Controllers\DocenteController::class, 'postdocenteodd'])->middleware('can:postdocenteodd')->name('postdocenteodd');
Route::get('/Docentes/Edot/{id}', [App\Http\Controllers\DocenteController::class, 'getdocenteedot'])->middleware('can:getdocenteedot')->name('getdocenteedot');
Route::put('/Docentes/{id}', [App\Http\Controllers\DocenteController::class, 'postdocenteedot'])->middleware('can:postdocenteedot')->name('postdocenteedot');
Route::delete('/Docentes/delete/{id}', [App\Http\Controllers\DocenteController::class, 'getdocentedelete'])->middleware('can:getdocentedelete')->name('getdocentedelete');

// RUtas de materias
Route::get('/Materias', [App\Http\Controllers\MateriaController::class, 'index'])->middleware('can:materias')->name('materias');
Route::get('/Materias/Nueva_Materia', [App\Http\Controllers\MateriaController::class, 'nueva_materia'])->middleware('can:materias')->name('nueva_materia');
Route::post('/Materias/Nueva_Materia', [App\Http\Controllers\MateriaController::class, 'postmaterias'])->middleware('can:materias')->name('materia_agregada');
Route::get('/Materias/Person_id', [App\Http\Controllers\ColegioController::class, 'mostrar_person_id'])->middleware('can:materias')->name('mostrar_person_id');

// Rutas de calificaciones: agregar, mostrar nombre de los alumnos, docentes y actividades en la tabla de calificaciones..
Route::get('/Calificaciones', [App\Http\Controllers\CalificacionController::class, 'mostrarcalificaciones'])->middleware('can:calificaciones')->name('mostrarcalificaciones');
Route::get('/Calificaciones/actividad', [App\Http\Controllers\ColegioController::class, 'mostrar_actividad'])->middleware('can:calificaciones')->name('mostrar_actividad');
Route::get('/Calificaciones/create', [App\Http\Controllers\CalificacionController::class, 'create'])->middleware('can:create_calificaciones')->name('calificaciones.create');
Route::post('/Calificaciones', [App\Http\Controllers\CalificacionController::class, 'store'])->middleware('can:create_calificaciones')->name('calificaciones.store');
Route::get('/Calificaciones/{calificacion}/edit', [App\Http\Controllers\CalificacionController::class, 'edit'])->middleware('can:create_calificaciones')->name('calificaciones.edit');
Route::put('/Calificaciones/{calificacion}', [App\Http\Controllers\CalificacionController::class, 'update'])->middleware('can:create_calificaciones')->name('calificaciones.update');

//Ruta de horarios
Route::get('/Horarios', [App\Http\Controllers\HorarioController::class, 'mostrarhorarios'])->middleware('can:mostrarhorarios')->name('mostrarhorarios');
Route::get('/Horarios/filtro', [App\Http\Controllers\HorarioController::class, 'filtro'])->middleware('can:mostrarhorarios')->name('filtro');
Route::get('/Horarios/materia', [App\Http\Controllers\ColegioController::class, 'mostrar_materia'])->middleware('can:mostrarhorarios')->name('mostrar_materia');
Route::get('/Horarios/grado', [App\Http\Controllers\ColegioController::class, 'mostrar_grado'])->middleware('can:mostrarhorarios')->name('mostrar_grado');
Route::get('/Horarios/Nuevos', [App\Http\Controllers\HorarioController::class, 'nuevo_horario'])->middleware('can:nuevo_horario')->name('nuevo_horario');
Route::post('/Horarios/Nuevo', [App\Http\Controllers\HorarioController::class, 'store'])->middleware('can:nuevo_horario')->name('store');
Route::get('/Horarios/Editar/{id}', [App\Http\Controllers\HorarioController::class, 'gethorarioedit'])->middleware('can:nuevo_horario')->name('editar_horarios');
Route::put('/Horarios/{id}', [App\Http\Controllers\HorarioController::class, 'puthorarioedit'])->middleware('can:nuevo_horario')->name('horario_editado');
Route::delete('/Horarios/delete/{id}', [App\Http\Controllers\HorarioController::class, 'eliminar_horarios'])->middleware('can:nuevo_horario')->name('colegio.horarios.delete');

//Rutas de jornada
Route::get('/Jornada', [App\Http\Controllers\JornadaController::class, 'mostrar_jornada'])->middleware('can:jornadas')->name('mostrar_jornadas');
Route::get('/Jornada/Nueva', [App\Http\Controllers\JornadaController::class, 'nueva_jornada'])->middleware('can:jornadas')->name('nueva_jornada');
Route::post('/Jornada/Nueva', [App\Http\Controllers\JornadaController::class, 'jornada_nueva'])->middleware('can:jornadas')->name('jornada_nueva');

//Rutas de actividades
Route::get('/Actividades', [App\Http\Controllers\ActividadController::class, 'mostrar_actividades'])->middleware('can:actividades')->name('mostrar_actividades');
Route::get('/Actividades/Nueva', [App\Http\Controllers\ActividadController::class, 'nueva_actividad'])->middleware('can:nueva_actividad')->name('nueva_actividad');
Route::post('/Actividades/Nueva', [App\Http\Controllers\ActividadController::class, 'actividad_nueva'])->middleware('can:nueva_actividad')->name('actividad_nueva');


//Rutas de perfiles y permisos: vista, agregar, editar y eliminar
Route::get('/Perfiles/Usuarios', [App\Http\Controllers\PersonaController::class, 'usuarios'])->middleware('can:usuarios')->name('usuarios');
Route::get('/Perfiles/Usuarios', [App\Http\Controllers\PersonaController::class, 'mostrarpersonas'])->middleware('can:mostrarusuarios')->name('mostrarpersonas');
Route::get('/Perfiles/Usuarios/{user}/Asignar_Rol/', [App\Http\Controllers\PersonaController::class, 'asignar_rol'])->middleware('can:asignar_rol')->name('asignar_rol');
Route::put('/Perfiles/Usuarios/{user}/Asignar_Rol/', [App\Http\Controllers\PersonaController::class, 'rol_asignado'])->middleware('can:rol_asignado')->name('rol_asignado');
Route::get('/Perfiles/Usuarios/Nuevo', [App\Http\Controllers\PersonaController::class, 'nuevo_usuario'])->middleware('can:crear_usuarios')->name('crear');
Route::post('/Perfiles/Usuarios/Nuevo', [App\Http\Controllers\PersonaController::class, 'usuario_nuevo'])->middleware('can:usuario_nuevo')->name('usuario_nuevo');
Route::get('/Perfiles/Personas', [App\Http\Controllers\PersonaController::class, 'personas'])->middleware('can:personas')->name('personas');