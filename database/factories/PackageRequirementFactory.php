<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Package;
use App\Data\Models\PackageRequirement;
use Faker\Generator as Faker;

$factory->define(PackageRequirement::class, function (Faker $faker) {
    return [
        'package_id' => function(){
        return factory(Package::class);
        },
        'requirements' => $faker->randomHtml(),
        'added_by' => 1
    ];
});
