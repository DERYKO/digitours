<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationPolicy extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'policy',
        'added_by'
    ];

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }

}
