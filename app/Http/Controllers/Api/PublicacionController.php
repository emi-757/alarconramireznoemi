<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublicacionRequest;
use App\Http\Requests\UpdatePublicacionRequest;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::with([
            'usuario',
            'categoria'
        ])
        ->orderBy('id_labor')
        ->get();

        return ApiResponse::success(
            'Lista de publicaciones.',
            $publicaciones
        );
    }

    public function store(StorePublicacionRequest $request)
    {
        $publicacion = Publicacion::create(
            $request->validated()
        );

        return ApiResponse::success(
            'Publicación registrada correctamente.',
            $publicacion,
            201
        );
    }

    public function show(string $id)
    {
        $publicacion = Publicacion::with([
            'usuario',
            'categoria'
        ])->find($id);

        if(!$publicacion){

            return ApiResponse::error(
                'Publicación no encontrada.',
                404
            );

        }

        return ApiResponse::success(
            'Publicación encontrada.',
            $publicacion
        );
    }

    public function update(UpdatePublicacionRequest $request,string $id)
    {
        $publicacion = Publicacion::find($id);

        if(!$publicacion){

            return ApiResponse::error(
                'Publicación no encontrada.',
                404
            );

        }

        $publicacion->update(
            $request->validated()
        );

        return ApiResponse::success(
            'Publicación actualizada correctamente.',
            $publicacion
        );
    }

    public function destroy(string $id)
    {
        $publicacion = Publicacion::find($id);

        if(!$publicacion){

            return ApiResponse::error(
                'Publicación no encontrada.',
               404
            );

        }

        $publicacion->delete();

        return ApiResponse::success(
            'Publicación eliminada correctamente.'
        );
    }
}