<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Http\Requests\StoreCalificacionRequest;
use App\Http\Requests\UpdateCalificacionRequest;

class CalificacionController extends Controller
{

    public function index()
    {
        return response()->json(
            Calificacion::with('contratacion')->get()
        );
    }


    public function store(StoreCalificacionRequest $request)
    {
        $calificacion = Calificacion::create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Calificación creada correctamente',
            'data' => $calificacion
        ],201);
    }


    public function show($id)
    {
        $calificacion = Calificacion::find($id);

        if(!$calificacion){
            return response()->json([
                'message'=>'Calificación no encontrada'
            ],404);
        }

        return response()->json($calificacion);
    }


    public function update(UpdateCalificacionRequest $request,$id)
    {
        $calificacion = Calificacion::find($id);

        if(!$calificacion){
            return response()->json([
                'message'=>'Calificación no encontrada'
            ],404);
        }


        $calificacion->update(
            $request->validated()
        );


        return response()->json([
            'message'=>'Calificación actualizada',
            'data'=>$calificacion
        ]);
    }


    public function destroy($id)
    {
        $calificacion = Calificacion::find($id);

        if(!$calificacion){
            return response()->json([
                'message'=>'Calificación no encontrada'
            ],404);
        }


        $calificacion->delete();


        return response()->json([
            'message'=>'Calificación eliminada'
        ]);
    }
}