<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Package;
use App\Data\Models\TravelDestination;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'travel_destination_id' => function(){
        return factory(TravelDestination::class);
        },
        'description' => $faker->word,
        'cover_photo' => $faker->randomElement([
            'https://turnup.travel/wp-content/uploads/2021/02/IMG_1400-scaled.jpg',
            'http://jangwani.co.ke/wp-content/uploads/2018/12/JangwaniCamp_Archery.jpg',
            'http://bkenya.com/wp-content/uploads/2015/02/IMG_9421.jpg'
        ]),
        'added_by' => 1
    ];
});
