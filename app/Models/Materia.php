<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'docente_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
