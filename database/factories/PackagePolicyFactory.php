<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Package;
use App\Data\Models\PackagePolicy;
use Faker\Generator as Faker;

$factory->define(PackagePolicy::class, function (Faker $faker) {
    return [
        'package_id' => function(){
        return factory(Package::class);
        },
        'policy' => $faker->paragraph,
        'added_by' => 1
    ];
});
