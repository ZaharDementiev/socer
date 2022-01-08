<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Http\JsonResponse;

class DataExistsException extends Exception
{
    public function render(): JsonResponse
    {
        return ResponseHelper::badRequestResponse('This data already stored');
    }
}

