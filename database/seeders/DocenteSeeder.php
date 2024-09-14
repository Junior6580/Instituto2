<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Docente;

class DocenteSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $numero_docentes= 50; // Definir la cantidad aprendices

        print_r("Generando " . $numero_docentes . " docentes.\n");
        $docentes = 0;
        for ($i=0; $i < $numero_docentes; $i++) {
            try { // Se almacena el factory dentro de un try catch para capturar el error de exepción por entrada duplicada de la llave docentes_persona_id_grado_id_jornada_id_unique
                Docente::factory()->create();
            } catch(Exception $e) {
                $docentes++;
                print_r("Falla número " . $docentes . " en la iteración " . $i . "\n");
            }
        }
    }
}
