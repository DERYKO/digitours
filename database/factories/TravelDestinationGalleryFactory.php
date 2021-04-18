<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\TravelDestination;
use App\Data\Models\TravelDestinationGallery;
use Faker\Generator as Faker;

$factory->define(TravelDestinationGallery::class, function (Faker $faker) {
    return [
        'travel_destination_id' => function(){
        return factory(TravelDestination::class);
        },
        'file_type' => 'image',
        'file_path' => $faker->imageUrl(640,480,'nature',true),
        'added_by' => 1
    ];
});
