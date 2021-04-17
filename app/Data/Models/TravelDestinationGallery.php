<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class TravelDestinationGallery extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'file_type',
        'file_path',
        'added_by'
    ];

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }
}
