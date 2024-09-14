<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persona;
use App\Models\Eps;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $tipos_de_documento = [ // Establecer los tipos de documentos existentes
            'Cédula de ciudadanía',
            'Tarjeta de identidad',
            'Cédula de extranjería',
            'Registro civil'
        ];

        return [
            'numero_de_documento' => $this->faker->unique()->randomNumber(rand(5,9), true),
            'tipo_de_documento' => $this->faker->randomElement($tipos_de_documento),
            'primer_nombre' => $this->faker->firstName(),
            'segundo_nombre' => $this->faker->firstName(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'eps_id' => EPS::inRandomOrder()->first()->id,
        ];
    }
}