<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'nombre_rol'=>'required|string|max:50|unique:roles,nombre_rol',

            'descripcion'=>'nullable|string|max:255',

            'estado'=>'required|boolean'

        ];
    }

    public function messages(): array
    {
        return [

            'nombre_rol.required'=>'El nombre del rol es obligatorio.',

            'nombre_rol.unique'=>'El rol ya existe.'

        ];
    }
}