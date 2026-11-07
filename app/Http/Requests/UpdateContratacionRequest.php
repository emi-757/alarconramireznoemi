<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContratacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'id_labor' => 'required|exists:publicaciones,id_labor',

            'id_contratador' => 'required|exists:users,id',

            'id_trabajador' => 'required|exists:users,id',

            'fecha_contratacion' => 'required|date',

            'estado' => 'required|in:En proceso,Finalizada,Cancelada'

        ];
    }
}