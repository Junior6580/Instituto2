<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public static function rules()
    {
        return [
            'persona_id' => 'unique:alumnos,persona_id',
        ];
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }
    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id');
    }
    public function calificacion()
    {
        return $this->belongsTo(Calificacion::class, 'persona_id');
    }
}
