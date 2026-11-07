<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table='users';

    protected $fillable=[

        'ci',

        'nombre',

        'apellido',

        'email',

        'telefono',

        'direccion',

        'password',
        'habilidades',
    'experiencia',
    'descripcion',


        'id_rol',

        'estado'

    ];

    protected $hidden=[

        'password',

        'remember_token'

    ];

    protected function casts(): array
    {
        return [

            'password'=>'hashed',

            'estado'=>'boolean'

        ];
    }

    public function rol()
    {
        return $this->belongsTo(
            Rol::class,
            'id_rol',
            'id_rol'
        );
    }
}