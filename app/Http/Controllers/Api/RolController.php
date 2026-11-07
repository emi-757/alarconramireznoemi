<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Models\Rol;

class RolController extends Controller
{

    public function index()
    {
        $roles = Rol::orderBy('id_rol')->get();

        return ApiResponse::success(
            'Lista de roles.',
            $roles
        );
    }

    public function store(StoreRolRequest $request)
    {
        $rol = Rol::create($request->validated());

        return ApiResponse::success(
            'Rol registrado correctamente.',
            $rol,
            201
        );
    }

    public function show(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {

            return ApiResponse::error(
                'Rol no encontrado.',
                404
            );
        }

        return ApiResponse::success(
            'Rol encontrado.',
            $rol
        );
    }

    public function update(UpdateRolRequest $request, string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {

            return ApiResponse::error(
                'Rol no encontrado.',
                404
            );
        }

        $rol->update($request->validated());

        return ApiResponse::success(
            'Rol actualizado correctamente.',
            $rol
        );
    }

    public function destroy(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {

            return ApiResponse::error(
                'Rol no encontrado.',
                404
            );
        }

        $rol->delete();

        return ApiResponse::success(
            'Rol eliminado correctamente.'
        );
    }
}