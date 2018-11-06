<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Webfinger extends JsonResource
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
          'subject' => $this->getSubject(),
          'links' => [
            [
              'rel' => 'self',
              'type' => 'application/activity+json',
              'href' => action('BikeController@show', ['bike' => $this])
            ]
          ]
        ];
    }

    /* inspired by pixelfed Webfinger setSubject() function */
    public function getSubject()
    {
      $host = parse_url(config('app.url'), PHP_URL_HOST);
      $username = $this->id;

      return 'acct:'.$username.'@'.$host;
    }
}
