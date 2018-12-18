<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BikeLocation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'longitude' => $this->location()->longitude,
          'latitude' => $this->location()->latitude,
          'notes' => $this->location()->notes
        ];
    }
}
