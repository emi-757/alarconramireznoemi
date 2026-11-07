<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    #[OA\Post(
        path: '/api/login',
        summary: 'Iniciar sesión',
        description: 'Permite iniciar sesión y obtener un token de acceso mediante Laravel Sanctum.',
        tags: ['Autenticación'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['email', 'password', 'device_name'],
                properties: [
                    new OA\Property(
                        property: 'email',
                        type: 'string',
                        format: 'email',
                        example: 'usuario@gmail.com'
                    ),
                    new OA\Property(
                        property: 'password',
                        type: 'string',
                        format: 'password',
                        example: '123456'
                    ),
                    new OA\Property(
                        property: 'device_name',
                        type: 'string',
                        example: 'Laragon'
                    )
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Inicio de sesión correcto'
            ),
            new OA\Response(
                response: 401,
                description: 'Correo o contraseña incorrectos'
            ),
            new OA\Response(
                response: 422,
                description: 'Datos de entrada inválidos'
            )
        ]
    )]
    public function login(LoginRequest $request)
    {
        $usuario = User::where('email', $request->email)->first();

        if (!$usuario) {

            return ApiResponse::error(
                'Correo incorrecto.',
                401
            );
        }

        if (!Hash::check($request->password, $usuario->password)) {

            return ApiResponse::error(
                'Contraseña incorrecta.',
                401
            );
        }

        $token = $usuario->createToken(
            $request->device_name
        )->plainTextToken;

        return ApiResponse::success(
            'Inicio de sesión correcto.',
            [
                'user' => $usuario,
                'token' => $token
            ]
        );
    }

    #[OA\Post(
        path: '/api/logout',
        summary: 'Cerrar sesión',
        description: 'Revoca el token de acceso actual del usuario autenticado.',
        tags: ['Autenticación'],
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Sesión cerrada correctamente'
            ),
            new OA\Response(
                response: 401,
                description: 'No autenticado'
            )
        ]
    )]
    public function logout(Request $request)
    {
        $request->user()
                ->currentAccessToken()
                ->delete();

        return ApiResponse::success(
            'Sesión cerrada correctamente.'
        );
    }

    #[OA\Get(
        path: '/api/user',
        summary: 'Obtener usuario autenticado',
        description: 'Obtiene la información del usuario que actualmente está autenticado.',
        tags: ['Autenticación'],
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Usuario autenticado'
            ),
            new OA\Response(
                response: 401,
                description: 'No autenticado'
            )
        ]
    )]
    public function user(Request $request)
    {
        return ApiResponse::success(
            'Usuario autenticado.',
            $request->user()->load('rol')
        );
    }
}