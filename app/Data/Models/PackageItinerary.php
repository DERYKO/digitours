<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    protected $fillable = [
        'package_id',
        'itinerary',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
