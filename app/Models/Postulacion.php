<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';

    protected $primaryKey = 'id_postulacion';

    protected $fillable = [

        'id_labor',
        'id_trabajador',
        'mensaje',
        'precio_referencial',
        'fecha_postulacion',
        'estado'

    ];

    protected $casts = [

        'precio_referencial' => 'decimal:2',
        'fecha_postulacion' => 'date'

    ];

    public function publicacion()
    {
        return $this->belongsTo(
            Publicacion::class,
            'id_labor',
            'id_labor'
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