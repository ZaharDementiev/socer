<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['name' => "string", 'description' => "string", 'type' => "int", 'region_id' => "int"])]
    public function rules(): array
    {
        return [
            'name'          =>  'required|string',
            'description'   =>  'required|string',
            'type'          =>  'required|numeric',
            'region_id'     =>  'numeric',
        ];
    }
}
