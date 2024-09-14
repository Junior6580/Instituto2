<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jornada;

class JornadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jornada::firstOrCreate(['id' => 1],[
            'nombre' => 'Mañana'
        ]);
        Jornada::factory(0)->create();
        Jornada::firstOrCreate(['id' => 2],[
            'nombre' => 'Tarde'
        ]);
        Jornada::factory(0)->create();
    }
}