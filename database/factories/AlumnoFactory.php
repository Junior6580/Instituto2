<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persona;
use App\Models\Grado;
use App\Models\Jornada;
use App\Models\Alumno;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'persona_id' => Persona::inRandomOrder()->first()->id,
            'grado_id' => Grado::inRandomOrder()->first()->id,
            'jornada_id' => Jornada::inRandomOrder()->first()->id,
        ];
    }
}
