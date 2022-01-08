<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryVotingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'category'          => new CategoryResource($this->category),
            'current_votes'     => $this->current_votes,
            'needed_votes'      => $this->needed_votes,
            'deadline'          => $this->deadline,
            'created_at'        => $this->created_at,
        ];
    }
}
