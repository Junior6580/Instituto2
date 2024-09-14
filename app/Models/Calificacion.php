<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumno_id',
        'materia_id',
        'nota'];

        public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
