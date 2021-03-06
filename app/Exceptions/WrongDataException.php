<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Http\JsonResponse;

class WrongDataException extends Exception
{
    public function render(): JsonResponse
    {
        return ResponseHelper::badRequestResponse('Wrong data entered');
    }
}
