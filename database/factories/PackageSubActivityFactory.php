<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\PackageSubActivity;
use Faker\Generator as Faker;

$factory->define(PackageSubActivity::class, function (Faker $faker) {
    return [
        'package_id' => function(){
        return factory(\App\Data\Models\Package::class);
        },
        'sub_activity_id' => function(){
        return factory(\App\Data\Models\SubActivity::class);
        },
        'added_by' => 1
    ];
});
