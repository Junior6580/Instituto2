<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\calificacionController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios',[App\Http\Controllers\UsuarioController::class, 'json'])->name('api');
Route::get('/calificaciones', [App\Http\Controllers\CalificacionesController::class,'filter'])->name('filter');
Route::post('/registrar-calificaciones/{usuarioId}', [App\Http\Controllers\AsistenciaController::class,'create'])->name('registrar_calificaciones.store');

