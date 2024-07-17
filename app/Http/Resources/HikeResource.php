<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'distance' => $this->distance,
            'estimated_duration' => $this->estimated_duration,
            'waypoints' => $this->waypoints,
            'group_id' => $this->group_id,
            'user_id' => $this->user_id,
            'image_id' => $this->image_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}
