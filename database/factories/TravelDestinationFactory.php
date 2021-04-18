<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\TravelDestination;
use Faker\Generator as Faker;

$factory->define(TravelDestination::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'logo' => $faker->imageUrl(),
        'address' => $faker->streetAddress,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'website' => $faker->url,
        'added_by' => 1
    ];
});
