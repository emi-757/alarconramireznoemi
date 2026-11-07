<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostulacionRequest;
use App\Http\Requests\UpdatePostulacionRequest;
use App\Models\Postulacion;

class PostulacionController extends Controller
{
    public function index()
    {
        $postulaciones = Postulacion::with([
            'publicacion',
            'trabajador'
        ])
        ->orderBy('id_postulacion')
        ->get();

        return ApiResponse::success(
            'Lista de postulaciones.',
            $postulaciones
        );
    }

    public function store(StorePostulacionRequest $request)
    {
        $postulacion = Postulacion::create(
            $request->validated()
        );

        return ApiResponse::success(
            'Postulación registrada correctamente.',
            $postulacion,
            201
        );
    }

    public function show(string $id)
    {
        $postulacion = Postulacion::with([
            'publicacion',
            'trabajador'
        ])->find($id);

        if (!$postulacion) {

            return ApiResponse::error(
                'Postulación no encontrada.',
                404
            );

        }

        return ApiResponse::success(
            'Postulación encontrada.',
            $postulacion
        );
    }

    public function update(UpdatePostulacionRequest $request, string $id)
    {
        $postulacion = Postulacion::find($id);

        if (!$postulacion) {

            return ApiResponse::error(
                'Postulación no encontrada.',
                404
            );

        }

        $postulacion->update(
            $request->validated()
        );

        return ApiResponse::success(
            'Postulación actualizada correctamente.',
            $postulacion
        );
    }

    public function destroy(string $id)
    {
        $postulacion = Postulacion::find($id);

        if (!$postulacion) {

            return ApiResponse::error(
                'Postulación no encontrada.',
                404
            );

        }

        $postulacion->delete();

        return ApiResponse::success(
            'Postulación eliminada correctamente.'
        );
    }
}