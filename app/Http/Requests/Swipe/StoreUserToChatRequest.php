<?php

namespace App\Http\Requests\Swipe;

use App\Models\Chat;
use App\Models\User;

class StoreUserToChatRequest extends StoreSwipeRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'swiper_type' => User::class,
            'swiped_type' => Chat::class,
        ]);
    }
}
