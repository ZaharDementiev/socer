<?php

namespace App\Repository;

use App\Models\Swipe;
use Illuminate\Database\Eloquent\Collection;

class SwipeRepository
{
    public function store(array $fields): Swipe
    {
        return Swipe::create($fields);
    }

    public function swipeExists(array $fields): bool
    {
        return Swipe::where($fields)->exists();
    }

//    public function getSwipesBySwiper(string $type, int $id): ?Collection
//    {
//        return Swipe::where('swiper_type', $type)->where('swiper_id', $id)->get();
//    }
//
//    public function getSwipesBySwiped(string $type, int $id): ?Collection
//    {
//        return Swipe::where('swiped_type', $type)->where('swiped_id', $id)->get();
//    }

    public function delete(int $id, string $swiperType, string $swipedType): bool
    {
        return Swipe::where('swiper_type', $swiperType)->where('swiper_id', $id)->where('swiped_type', $swipedType)->delete();
    }
}
