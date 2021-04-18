<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Activity;
use App\User;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Nature & Adventure','Water Activities','Team Building','Mall Activities']),
        'cover_photo' => $faker->imageUrl(640,480,'nature',true),
        'added_by' =>  function () {
            return factory(User::class);
        },
    ];
});
