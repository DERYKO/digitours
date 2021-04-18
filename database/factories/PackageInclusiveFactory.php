<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Package;
use App\Data\Models\PackageInclusive;
use Faker\Generator as Faker;

$factory->define(PackageInclusive::class, function (Faker $faker) {
    return [
        'package_id' => function(){
        return factory(Package::class);
        },
        'inclusive' => $faker->randomHtml(),
        'added_by' => 1
    ];
});
