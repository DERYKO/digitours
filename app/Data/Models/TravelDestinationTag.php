<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationTag extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'activity_id',
        'added_by'
    ];
}
