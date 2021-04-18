<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['MPESA','CARD','WALLET']),
        'status' => 1,
        'added_by' => 1
    ];
});
