<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['name' => "string", 'description' => "string"])]
    public function rules(): array
    {
        return [
            'name'          =>  'required|string',
            'description'   =>  'required|string',
        ];
    }
}
