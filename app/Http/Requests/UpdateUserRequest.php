<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id=$this->route('user');

        return [

            'ci'=>'required|string|max:20|unique:users,ci,'.$id,

            'nombre'=>'required|string|max:100',

            'apellido'=>'required|string|max:100',

            'email'=>'required|email|unique:users,email,'.$id,

            'telefono'=>'nullable|string|max:20',

            'direccion'=>'nullable|string|max:255',

            'password'=>'nullable|min:6',

            'id_rol'=>'required|exists:roles,id_rol',

            'estado'=>'required|boolean'

        ];
    }
}