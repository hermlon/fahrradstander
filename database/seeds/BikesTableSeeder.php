3<?php

use Illuminate\Database\Seeder;

class BikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bike::class, 10)->create()->each(function ($bike) {
          factory(App\Location::class, 4)->create(['bike_id' => $bike->id]);
        });
    }
}
