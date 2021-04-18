<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Package;
use App\Data\Models\PackageExclusive;
use Faker\Generator as Faker;

$factory->define(PackageExclusive::class, function (Faker $faker) {
    return [
        'package_id' => function(){
        return factory(Package::class);
        },
        'exclusive' => $faker->randomHtml(),
        'added_by' => 1
    ];
});
