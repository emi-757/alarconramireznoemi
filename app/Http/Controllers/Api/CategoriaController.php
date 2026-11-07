<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Mostrar todas las categorías.
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id_categoria')->get();

        return ApiResponse::success(
            'Lista de categorías.',
            $categorias
        );
    }

    /**
     * Registrar una categoría.
     */
    public function store(StoreCategoriaRequest $request)
    {
        $categoria = Categoria::create(
            $request->validated()
        );

        return ApiResponse::success(
            'Categoría registrada correctamente.',
            $categoria,
            201
        );
    }

    /**
     * Mostrar una categoría.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {

            return ApiResponse::error(
                'Categoría no encontrada.',
                404
            );

        }

        return ApiResponse::success(
            'Categoría encontrada.',
            $categoria
        );
    }

    /**
     * Actualizar una categoría.
     */
    public function update(UpdateCategoriaRequest $request, string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {

            return ApiResponse::error(
                'Categoría no encontrada.',
                404
            );

        }

        $categoria->update(
            $request->validated()
        );

        return ApiResponse::success(
            'Categoría actualizada correctamente.',
            $categoria
        );
    }

    /**
     * Eliminar una categoría.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {

            return ApiResponse::error(
                'Categoría no encontrada.',
                404
            );

        }

        $categoria->delete();

        return ApiResponse::success(
            'Categoría eliminada correctamente.'
        );
    }
}