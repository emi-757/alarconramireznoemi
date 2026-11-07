<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([

            'ci'=>'12345678',

            'nombre'=>'Administrador',

            'apellido'=>'Sistema',

            'email'=>'admin@redwork.com',

            'telefono'=>'77777777',

            'direccion'=>'La Paz',

            'password'=>Hash::make('123456'),

            'id_rol'=>1,

            'estado'=>true

        ]);
    }
}