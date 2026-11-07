<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($message, $data = null, $code = 200)
    {
        return response()->json([

            'status' => 'success',

            'code' => $code,

            'message' => $message,

            'data' => $data

        ], $code);
    }

    public static function error($message, $code = 400, $errors = null)
    {
        return response()->json([

            'status' => 'error',

            'code' => $code,

            'message' => $message,

            'errors' => $errors

        ], $code);
    }
}