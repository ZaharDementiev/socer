<?php

namespace App\Http\Requests\Swipe;

use Illuminate\Foundation\Http\FormRequest;

abstract class StoreSwipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
