<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationLocality extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'locality_id'
    ];
}
