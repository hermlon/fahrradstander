<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now', $timezone = null);
    return [
        'latitude' => $faker->randomFloat($nbMaxDecimals = 6, $min = 50, $max = 57),
        'longitude' => $faker->randomFloat($nbMaxDecimals = 6, $min = 8, $max = 15),
        'notes' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
