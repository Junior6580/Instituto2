<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persona;
use App\Models\Grado;
use App\Models\Jornada;
use App\Models\Docente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Docente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'persona_id' => Persona::inRandomOrder()->first()->id,
            'jornada_id' => Jornada::inRandomOrder()->first()->id,
        ];
    }
}
