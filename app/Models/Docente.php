<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    public static function rules()
    {
        return [
            'persona_id' => 'unique:docentes,persona_id',
        ];
    }
}
