<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationSubActivity extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'sub_activity_id',
        'cost',
        'added_by'
    ];
}
