<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class TravelDestinationGallery extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'file_type',
        'file_path',
        'added_by'
    ];
    public function getFilePathAttribute($value)
    {
        if ($value && !str_contains($value, 'http')) {
            return URL::to('storage/' . $value);
        } else {
            return $value;
        }
    }

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }
}
