<?php

namespace App\Http\Requests\Swipe;

use App\Models\User;

class StoreUserToUserRequest extends StoreSwipeRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'swiper_type' => User::class,
            'swiped_type' => User::class,
        ]);
    }
}
