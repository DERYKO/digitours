<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\Activity;
use App\Data\Models\SubActivity;
use App\Data\Models\UserBucketList;
use App\User;
use Faker\Generator as Faker;

$factory->define(UserBucketList::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        return factory(User::class);
        },
        'activity_id' => function(){
        return factory(Activity::class);
        },
        'sub_activity_id' => function(){
            return factory(SubActivity::class);
        },
        'complete' => 0
    ];
});
