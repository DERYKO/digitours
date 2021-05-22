<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationRoute extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'route_id'
    ];
}
