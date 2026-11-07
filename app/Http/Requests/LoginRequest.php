<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'email'=>'required|email',

            'password'=>'required|string',

            'device_name'=>'required|string'

        ];
    }

    public function messages(): array
    {
        return [

            'email.required'=>'El correo es obligatorio.',

            'password.required'=>'La contraseña es obligatoria.',

            'device_name.required'=>'El nombre del dispositivo es obligatorio.'

        ];
    }
}