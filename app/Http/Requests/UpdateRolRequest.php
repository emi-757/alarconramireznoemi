<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id=$this->route('role');

        return [

            'nombre_rol'=>'required|string|max:50|unique:roles,nombre_rol,'.$id.',id_rol',

            'descripcion'=>'nullable|string|max:255',

            'estado'=>'required|boolean'

        ];
    }
}