<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SwipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     */
    public function toArray($request): array
    {
        if ($this->swiper_type == User::class) {
            $swiper = new UserResource($this->swiperUser());
        } else {
            $swiper = new ChatResource($this->swiperChat());
        }

        if ($this->swiped_type == User::class) {
            $swiped = new UserResource($this->swipedUser());
        } else {
            $swiped = new ChatResource($this->swipedChat());
        }

        return [
            'id'            => $this->id,
            'swiper_type'   => $this->swiper_type,
            'swiper'        => $swiper,
            'swiped_type'   => $this->swiped_type,
            'swiped'        => $swiped,
            'value'         => $this->value,
            'created_at'    => $this->created_at,
        ];
    }
}
