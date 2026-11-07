<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('rol')
            ->orderBy('id')
            ->get();

        return ApiResponse::success(
            'Lista de usuarios.',
            $usuarios
        );
    }

    public function store(StoreUserRequest $request)
    {
        $datos = $request->validated();

        $datos['password'] = Hash::make($datos['password']);

        $usuario = User::create($datos);

        return ApiResponse::success(
            'Usuario registrado correctamente.',
            $usuario,
            201
        );
    }

    public function show(string $id)
    {
        $usuario = User::with('rol')->find($id);

        if (!$usuario) {

            return ApiResponse::error(
                'Usuario no encontrado.',
                404
            );

        }

        return ApiResponse::success(
            'Usuario encontrado.',
            $usuario
        );
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $usuario = User::find($id);

        if (!$usuario) {

            return ApiResponse::error(
                'Usuario no encontrado.',
                404
            );

        }

        $datos = $request->validated();

        if (!empty($datos['password'])) {

            $datos['password'] = Hash::make($datos['password']);

        } else {

            unset($datos['password']);

        }

        $usuario->update($datos);

        return ApiResponse::success(
            'Usuario actualizado correctamente.',
            $usuario
        );
    }

    public function destroy(string $id)
    {
        $usuario = User::find($id);

        if (!$usuario) {

            return ApiResponse::error(
                'Usuario no encontrado.',
                404
            );

        }

        $usuario->delete();

        return ApiResponse::success(
            'Usuario eliminado correctamente.'
        );
    }
}