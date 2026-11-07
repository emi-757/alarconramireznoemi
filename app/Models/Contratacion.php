<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratacion extends Model
{
    use HasFactory;

    protected $table = 'contrataciones';

    protected $primaryKey = 'id_contratacion';

    protected $fillable = [

        'id_labor',

        'id_contratador',

        'id_trabajador',

        'fecha_contratacion',

        'estado'

    ];

    protected $casts = [

        'fecha_contratacion' => 'date'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function publicacion()
    {
        return $this->belongsTo(
            Publicacion::class,
            'id_labor',
            'id_labor'
        );
    }

    public function contratador()
    {
        return $this->belongsTo(
            User::class,
            'id_contratador',
            'id'
        );
    }

    public function trabajador()
    {
        return $this->belongsTo(
            User::class,
            'id_trabajador',
            'id'
        );
    }
}