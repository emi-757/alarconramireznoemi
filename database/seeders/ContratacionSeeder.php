<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contratacion;

class ContratacionSeeder extends Seeder
{
    public function run(): void
    {
        Contratacion::create([

            'id_labor' => 1,

            'id_contratador' => 1,

            'id_trabajador' => 2,

            'fecha_contratacion' => now(),

            'estado' => 'En proceso'

        ]);
    }
}