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
      // not sure whether it works correctly
      return $query->whereHas('locations', function ($q) use($latitude, $longitude, $radius){
        $q->latest()->whereRaw('ST_Distance_Sphere(
              point(longitude, latitude),
              point(?, ?)
              ) < ?', [$longitude, $latitude, $radius]);
      });
    }

    public function scopeBounding($query, $latNorth, $lonEast, $latSouth, $lonWest)
    {
      return $query->whereHas('locations', function ($q) use($latNorth, $lonEast, $latSouth, $lonWest){
        $q->whereRaw('`locations`.`id` = (select `locations`.`id` from `locations` where `bikes`.`id` = `locations`.`bike_id` order by `created_at` desc limit 1)')
        ->whereBetween('latitude', [$latSouth, $latNorth])
        ->whereBetween('longitude', [$lonWest, $lonEast]);
      });
    }

    protected $dispatchesEvents = [
        'creating' => BikeCreating::class,
    ];
}
