<?php

namespace App\Data\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

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

    public function getLogoAttribute($value)
    {
        if ($value && !str_contains($value, 'http')) {
            return URL::to('storage/' . $value);
        } else {
            return $value;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }

    public function travel_destination_contacts()
    {
        return $this->hasMany(TravelDestinationContact::class, 'travel_destination_id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(TravelDestinationContact::class, 'travel_destination_id', 'id');
    }

    public function package()
    {
        return $this->hasMany(Package::class, 'travel_destination_id', 'id');
    }

    public function policy()
    {
        return $this->hasOne(TravelDestinationPolicy::class, 'travel_destination_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(TravelDestinationGallery::class, 'travel_destination_id', 'id');
    }

    public function scopeFilterBy($query, $filters)
    {
        $query->when(isset($filters['search']), function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
            $query->OrWhere('address', 'like', '%' . $filters['search'] . '%');
            $query->OrWhere('latitude', 'like', '%' . $filters['search'] . '%');
            $query->OrWhere('longitude', 'like', '%' . $filters['search'] . '%');
            $query->OrWhereHas('package', function ($q) use ($filters) {
                $q->where('description', 'like', '%' . $filters['search'] . '%');
            });
        });
    }
}
