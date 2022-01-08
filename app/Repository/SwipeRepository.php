<?php

namespace App\Repository;

use App\Helpers\ValidatedModel;
use App\Models\Swipe;

class SwipeRepository
{
    public function store(ValidatedModel $fields): Swipe
    {
        return Swipe::create($fields->getArray());
    }

    public function swipeExists(ValidatedModel $fields): bool
    {
        return Swipe::where($fields->getArray())->exists();
    }

    public function delete(int $id, string $swiperType, string $swipedType): bool
    {
        return Swipe::where('swiper_type', $swiperType)->where('swiper_id', $id)->where('swiped_type', $swipedType)->delete();
    }
}
