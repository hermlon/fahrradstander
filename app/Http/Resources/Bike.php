<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bike extends JsonResource
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
          '@context' => ["https://www.w3.org/ns/activitystreams", "https://w3id.org/security/v1"],
          'id' => action('BikeController@show', ['bike' => $this]),
          'type' => 'Service',
          'preferredUsername' => 'fahrrad-user-name',
          'inbox' => action('BikeController@inbox', ['bike' => $this]),
          'publicKey' => [
            'id'           => action('BikeController@show', ['bike' => $this]) . '#main-key',
            'owner'        => action('BikeController@show', ['bike' => $this]),
            'publicKeyPem' => $this->public_key,
          ],
        ];
    }
}
