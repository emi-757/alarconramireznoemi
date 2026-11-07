<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PublicacionController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PostulacionController;
use App\Http\Controllers\Api\ContratacionController;
use App\Http\Controllers\Api\CalificacionController;
Route::apiResource('calificaciones', CalificacionController::class);
Route::apiResource('contrataciones', ContratacionController::class);
Route::post('/login',[AuthController::class,'login']);

Route::apiResource('roles',RolController::class);

Route::apiResource('users',UserController::class);

Route::apiResource('categorias',CategoriaController::class);
Route::apiResource('publicaciones', PublicacionController::class);
Route::apiResource('postulaciones', PostulacionController::class);

Route::middleware('auth:sanctum')->group(function(){

    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/user',[AuthController::class,'user']);

});