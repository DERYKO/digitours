<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestination extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'address',
        'latitude',
        'longitude',
        'website',
        'added_by'
    ];
}
