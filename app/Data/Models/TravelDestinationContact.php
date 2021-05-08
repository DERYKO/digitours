<?php

namespace App\Data\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TravelDestinationContact extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'contact_type_id',
        'value',
        'added_by'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class);
    }
}
