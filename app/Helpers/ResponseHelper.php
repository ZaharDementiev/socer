<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public static function badRequestResponse(string $message): JsonResponse
    {
        return response()->json([
            'data'      => null,
            'status'    => false,
            'error'     => [
                'message'   => $message,
                'code'      => 400
            ]
        ], 400);
    }
}
