<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class WrongDataException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'data'      => null,
            'status'    => false,
            'error'     => [
                'message'   => 'Wrong data entered',
                'code'      => 400
            ]
        ], 400);
    }
}
