<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCalificacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_contratacion' => 'sometimes|required|exists:contrataciones,id_contratacion',
            'puntuacion' => 'sometimes|required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:500',
        ];
    }
}