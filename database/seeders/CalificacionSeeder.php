<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calificacion;
use Carbon\Carbon;

class CalificacionSeeder extends Seeder
{
    public function run(): void
    {

        Calificacion::create([

            'id_contratacion' => 1,

            'id_emisor' => 1,

            'id_receptor' => 2,

            'puntuacion' => 5,

            'comentario' => 'Excelente trabajo, muy profesional',

            'fecha_calificacion' => Carbon::now()

        ]);


        Calificacion::create([

            'id_contratacion' => 2,

            'id_emisor' => 2,

            'id_receptor' => 1,

            'puntuacion' => 4,

            'comentario' => 'Buen servicio realizado',

            'fecha_calificacion' => Carbon::now()

        ]);

    }
}