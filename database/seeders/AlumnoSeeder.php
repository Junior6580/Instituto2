<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;


class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $numero_alumnos= 50; // Definir la cantidad aprendices

        print_r("Generando " . $numero_alumnos . " alumnos.\n");
        $alumnos = 0;
        for ($i=0; $i < $numero_alumnos; $i++) {
            try { // Se almacena el factory dentro de un try catch para capturar el error de exepción por entrada duplicada de la llave alumnos_persona_id_grado_id_jornada_id_unique
                Alumno::factory()->create();
            } catch(Exception $e) {
                $alumnos++;
                print_r("Falla número " . $alumnos . " en la iteración " . $i . "\n");
            }
        }
    }
}
