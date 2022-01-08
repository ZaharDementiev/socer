<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateException extends Exception
{
    public function render(): JsonResponse
    {
        return ResponseHelper::badRequestResponse('Cannot update');
    }
}
