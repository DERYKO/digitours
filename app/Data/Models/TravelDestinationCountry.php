<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationCountry extends Model
{
    protected $fillable = [
      'travel_destination_id',
      'country_id'
    ];
}
