<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bike;

class Location extends Model
{
    public function bike() {
      return $this->belongsTo(Bike::class);
    }
}
