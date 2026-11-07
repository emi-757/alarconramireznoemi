<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'ci'=>'required|string|max:20|unique:users,ci',

            'nombre'=>'required|string|max:100',

            'apellido'=>'required|string|max:100',

            'email'=>'required|email|unique:users,email',

            'telefono'=>'nullable|string|max:20',

            'direccion'=>'nullable|string|max:255',

            'password'=>'required|min:6',

            'id_rol'=>'required|exists:roles,id_rol',

            'estado'=>'required|boolean'

        ];
    }

    public function messages(): array
    {
        return [

            'ci.required'=>'La cédula es obligatoria.',

            'ci.unique'=>'La cédula ya existe.',

            'email.unique'=>'El correo ya existe.'

        ];
    }
}