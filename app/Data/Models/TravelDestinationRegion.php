<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationRegion extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'region_id'
    ];
}
