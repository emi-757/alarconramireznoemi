<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'tipo'=>'required|string|max:30',

            'titulo'=>'required|string|max:200',

            'descripcion'=>'required|string',

            'pago'=>'required|numeric|min:0',

            'lugar'=>'required|string|max:200',

            'fecha_publicacion'=>'required|date',

            'id_usuario'=>'required|exists:users,id',

            'id_categoria'=>'required|exists:categorias,id_categoria',

            'estado'=>'required|boolean'

        ];
    }
}