<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    // radius in meters
    public function scopeNearby($query, $latitude, $longitude, $radius)
    {
      return $query->whereRaw('ST_Distance_Sphere(
            point(longitude, latitude),
            point(?, ?)
            ) < radius', [$longitude, $latitude, $radius]);
    }
}
