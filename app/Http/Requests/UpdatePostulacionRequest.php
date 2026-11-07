<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostulacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'id_labor' => 'required|exists:publicaciones,id_labor',

            'id_trabajador' => 'required|exists:users,id',

            'mensaje' => 'required|string|max:500',

            'precio_referencial' => 'nullable|numeric|min:0',

            'fecha_postulacion' => 'required|date',

            'estado' => 'required|in:Pendiente,Aceptada,Rechazada,Cancelada'

        ];
    }
}