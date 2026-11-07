<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'API RedWork',
    version: '1.0.0',
    description: 'API REST para la plataforma RedWork'
)]
#[OA\Server(
    url: 'http://127.0.0.1:8000',
    description: 'Servidor local'
)]
#[OA\SecurityScheme(
    securityScheme: 'bearerAuth',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'Sanctum Token',
    description: 'Token generado mediante Laravel Sanctum. Ingresar únicamente el token, sin escribir "Bearer".'
)]
class OpenApiSpec
{
}