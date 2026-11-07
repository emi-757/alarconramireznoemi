<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Postulacion;
use App\Models\User;
use Carbon\Carbon;

class PostulacionSeeder extends Seeder
{
    public function run(): void
    {

        // Buscar un usuario con rol Trabajador (id_rol = 3)
        $trabajador = User::where('id_rol', 3)->first();


        // Validar que exista un trabajador
        if (!$trabajador) {
            throw new \Exception(
                'No existe ningún usuario con rol trabajador (id_rol = 3)'
            );
        }


        Postulacion::create([

            'id_labor' => 1,

            // Usuario que tiene rol trabajador
            'id_trabajador' => $trabajador->id,

            'mensaje' => 'Tengo experiencia en este tipo de trabajo y disponibilidad inmediata.',

            'precio_referencial' => 450,

            'fecha_postulacion' => Carbon::now(),

            'estado' => 'Pendiente'

        ]);

    }
}