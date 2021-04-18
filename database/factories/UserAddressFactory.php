<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\UserAddress;
use Faker\Generator as Faker;

$factory->define(UserAddress::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        return factory(\App\User::class);
        },
        'address' => $faker->streetAddress,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});
