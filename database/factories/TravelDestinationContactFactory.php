<?php

/** @var Factory $factory */

use App\Data\Models\ContactType;
use App\Data\Models\TravelDestination;
use App\Data\Models\TravelDestinationContact;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(TravelDestinationContact::class, function (Faker $faker) {
    return [
        'travel_destination_id' => function () {
            return factory(TravelDestination::class);
        },
        'contact_type_id' => function () {
            return factory(ContactType::class);
        },
        'value' => $faker->companyEmail,
        'added_by' => 1
    ];
});
