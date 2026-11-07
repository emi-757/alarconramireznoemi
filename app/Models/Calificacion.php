<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificaciones';

    protected $primaryKey = 'id_calificacion';

    protected $fillable = [

        'id_contratacion',
        'id_emisor',
        'id_receptor',
        'puntuacion',
        'comentario',
        'fecha_calificacion'

    ];

    protected $casts = [

        'fecha_calificacion' => 'date'

    ];

    public function contratacion()
    {
        return $this->belongsTo(
            Contratacion::class,
            'id_contratacion',
            'id_contratacion'
        );
    }

    public function emisor()
    {
        return $this->belongsTo(
            User::class,
            'id_emisor',
            'id'
        );
    }

    public function receptor()
    {
        return $this->belongsTo(
            User::class,
            'id_receptor',
            'id'
        );
    }
}