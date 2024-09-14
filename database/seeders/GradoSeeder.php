<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Grado::firstOrCreate(['id' => 1],[
            'nombre' => 'Sexto'
        ]);
        Grado::firstOrCreate(['id' => 2],[
            'nombre' => 'Septimo'
        ]);
        Grado::firstOrCreate(['id' => 3],[
            'nombre' => 'Octavo'
        ]);
        Grado::firstOrCreate(['id' => 4],[
            'nombre' => 'Noveno'
        ]);
        Grado::firstOrCreate(['id' => 5],[
            'nombre' => 'Decimo'
        ]);
        Grado::firstOrCreate(['id' => 6],[
            'nombre' => 'Once'
        ]);
         Grado::factory(0)->create();
    }
}
