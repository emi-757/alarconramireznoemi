<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $primaryKey = 'id_labor';

    protected $fillable = [

        'tipo',

        'titulo',

        'descripcion',

        'pago',

        'lugar',

        'fecha_publicacion',

        'id_usuario',

        'id_categoria',

        'estado'
    ];

    protected $casts = [

        'pago' => 'decimal:2',

        'fecha_publicacion' => 'date',

        'estado' => 'boolean'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'id_usuario',
            'id'
        );
    }

    public function categoria()
    {
        return $this->belongsTo(
            Categoria::class,
            'id_categoria',
            'id_categoria'
        );
    }
}