<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class DataExistsException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'data'      => null,
            'status'    => false,
            'error'     => [
                'message'   => 'This data already stored',
                'code'      => 400
            ]
        ], 400);
    }
}

