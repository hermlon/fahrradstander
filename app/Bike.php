<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\BikeCreating;
use App\Location;

class Bike extends Model
{
    public function locations() {
      return $this->hasMany(Location::class);
    }

    public function location() {
      return $this->locations()->latest()->first();
    }

    // radius in meters
    public function scopeNearby($query, $latitude, $longitude, $radius)
    {
      return $query->whereHas('locations', function ($q) use($latitude, $longitude, $radius){
        $q->latest()->whereRaw('ST_Distance_Sphere(
              point(longitude, latitude),
              point(?, ?)
              ) < ?', [$longitude, $latitude, $radius]);
      });
    }

    protected $dispatchesEvents = [
        'creating' => BikeCreating::class,
    ];
}
