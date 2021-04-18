<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\PackageItinerary;
use Faker\Generator as Faker;

$factory->define(PackageItinerary::class, function (Faker $faker) {
    return [
        'package_id' =>function(){
        return factory(\App\Data\Models\Package::class);
        },
        'itinerary' => $faker->randomHtml(),
        'added_by' => 1
    ];
});
