<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Package;
use App\Data\Models\PackageCost;
use Faker\Generator as Faker;

$factory->define(PackageCost::class, function (Faker $faker) {
    return [
        'package_id' => function(){
        return factory(Package::class);
        },
        'description' => $faker->word,
        'cost' => $faker->randomFloat(2,1000,10000),
        'minimum_deposit' => $faker->randomFloat(2,5000,7000),
        'added_by' => 1
    ];
});
