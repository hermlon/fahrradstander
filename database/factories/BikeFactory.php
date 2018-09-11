<?php

use Faker\Generator as Faker;

$factory->define(App\Bike::class, function (Faker $faker) {
    return [
        'latitude' => $faker->randomFloat($nbMaxDecimals = 6, $min = 51, $max = 53),
        'longitude' => $faker->randomFloat($nbMaxDecimals = 6, $min = 10, $max = 12),
        'notes' => $faker->sentence($nbWords = 8, $variableNbWords = true)
    ];
});
