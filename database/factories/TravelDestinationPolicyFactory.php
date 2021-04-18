<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\TravelDestination;
use App\Data\Models\TravelDestinationPolicy;
use Faker\Generator as Faker;

$factory->define(TravelDestinationPolicy::class, function (Faker $faker) {
    return [
        'travel_destination_id' => function(){
        return factory(TravelDestination::class);
        },
        'policy' => $faker->paragraph,
        'added_by' => 1
    ];
});
