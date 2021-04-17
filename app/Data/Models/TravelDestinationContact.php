<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationContact extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'contact_type_id',
        'value',
        'added_by'
    ];

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class);
    }
}
