<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publicacion;

class PublicacionSeeder extends Seeder
{
    public function run(): void
    {
        Publicacion::create([

            'tipo'=>'Tiempo Completo',

            'titulo'=>'Desarrollador Flutter',

            'descripcion'=>'Desarrollo de aplicaciones móviles.',

            'pago'=>3500,

            'lugar'=>'La Paz',

            'fecha_publicacion'=>now(),

            'id_usuario'=>1,

            'id_categoria'=>1,

            'estado'=>true

        ]);
    }
}