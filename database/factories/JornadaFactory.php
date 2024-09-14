<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jornada;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jornada>
 */
class JornadaFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Jornada::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nombre' => fake()->name(),
        ];
    }
}