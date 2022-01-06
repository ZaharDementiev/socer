<?php

namespace App\Http\Requests\Swipe;

use App\Models\Chat;
use App\Models\User;

class StoreChatToUserRequest extends StoreSwipeRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'swiper_type' => Chat::class,
            'swiped_type' => User::class,
        ]);
    }
}
