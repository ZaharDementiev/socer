<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name'          => $this->name,
            'description'   => $this->description,
            'type'          => $this->type,
            'region'        => $this->region,
            'user'          => new UserResource($this->user),
            'created_at'    => $this->created_at,
        ];
    }
}
