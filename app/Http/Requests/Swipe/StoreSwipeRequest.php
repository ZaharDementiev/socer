<?php

namespace App\Http\Requests\Swipe;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

abstract class StoreSwipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['swiper_type' => "string", 'swiper_id' => "int", 'swiped_type' => "string", 'swiped_id' => "int", 'value' => "int"])]
    public function rules(): array
    {
        return [
            'swiper_type'   =>  'required|string',
            'swiper_id'     =>  'required|numeric',
            'swiped_type'   =>  'required|string',
            'swiped_id'     =>  'required|numeric',
            'value'         =>  'required|numeric',
        ];
    }
}
