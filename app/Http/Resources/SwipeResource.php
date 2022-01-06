<?php

namespace App\Http\Resources;

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
        return [
            'id'            => $this->id,
            'swiper_type'   => $this->swiper_type,
            'swiper_id'     => $this->swiper_id,
            'swiped_type'   => $this->swiped_type,
            'swiped_id'     => $this->swiped_id,
            'value'         => $this->value,
            'created_at'    => $this->created_at,
        ];
    }
}
