<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContratacionRequest;
use App\Http\Requests\UpdateContratacionRequest;
use App\Models\Contratacion;

class ContratacionController extends Controller
{
    public function index()
    {
        $contrataciones = Contratacion::with([
            'publicacion',
            'contratador',
            'trabajador'
        ])
        ->orderBy('id_contratacion')
        ->get();

        return ApiResponse::success(
            'Lista de contrataciones.',
            $contrataciones
        );
    }

    public function store(StoreContratacionRequest $request)
    {
        $contratacion = Contratacion::create(
            $request->validated()
        );

        return ApiResponse::success(
            'Contratación registrada correctamente.',
            $contratacion,
            201
        );
    }

    public function show(string $id)
    {
        $contratacion = Contratacion::with([
            'publicacion',
            'contratador',
            'trabajador'
        ])->find($id);

        if (!$contratacion) {

            return ApiResponse::error(
                'Contratación no encontrada.',
                404
            );

        }

        return ApiResponse::success(
            'Contratación encontrada.',
            $contratacion
        );
    }

    public function update(UpdateContratacionRequest $request, string $id)
    {
        $contratacion = Contratacion::find($id);

        if (!$contratacion) {

            return ApiResponse::error(
                'Contratación no encontrada.',
                404
            );

        }

        $contratacion->update(
            $request->validated()
        );

        return ApiResponse::success(
            'Contratación actualizada correctamente.',
            $contratacion
        );
    }

    public function destroy(string $id)
    {
        $contratacion = Contratacion::find($id);

        if (!$contratacion) {

            return ApiResponse::error(
                'Contratación no encontrada.',
                404
            );

        }

        $contratacion->delete();

        return ApiResponse::success(
            'Contratación eliminada correctamente.'
        );
    }
}