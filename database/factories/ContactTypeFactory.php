<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\ContactType;
use App\User;
use Faker\Generator as Faker;

$factory->define(ContactType::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Phone','Email','Website']),
        'type' => $faker->randomElement(['phone','email']),
        'added_by' => 1
    ];
});
