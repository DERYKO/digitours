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
        'description',
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

    public function sub_activities()
    {
        return $this->hasMany(TravelDestinationSubActivity::class, 'travel_destination_id', 'id');
    }

    public function tags()
    {
        return $this->hasMany(TravelDestinationTag::class, 'travel_destination_id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(TravelDestinationContact::class, 'travel_destination_id', 'id');
    }

    public function packages()
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

    public function travel_destination_country()
    {
        return $this->hasOne(TravelDestinationCountry::class);
    }

    public function travel_destination_region()
    {
        return $this->hasOne(TravelDestinationRegion::class);
    }

    public function scopeFilterBy($query, $filters)
    {
        $query->when(isset($filters['search']), function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
            $query->orWhere('address', 'like', '%' . $filters['search'] . '%');
            $query->orWhereHas('package', function ($q) use ($filters) {
                $q->where('description', 'like', '%' . $filters['search'] . '%');
            });
        })->when(isset($filters['sub_activities']) && count($filters['sub_activities']), function ($q) use ($filters) {
                $q->whereHas('sub_activities', function ($q) use ($filters) {
                    $q->whereIn('sub_activity_id', $filters['sub_activities']);
                });
            })->when(isset($filters['countries']) && count($filters['countries']), function ($q) use ($filters) {
                $q->whereHas('travel_destination_country', function ($q) use ($filters) {
                    $q->whereIn('country_id', $filters['countries']);
                });
            })->when(isset($filters['regions']) && count($filters['regions']), function ($q) use ($filters) {
                $q->whereHas('travel_destination_region', function ($q) use ($filters) {
                    $q->whereIn('region_id', $filters['regions']);
                });
            });
//            ->when(isset($filters['price']) && count($filters['price']), function ($q) use ($filters) {
//            $q->whereHas('packages', function ($q) use ($filters) {
//                $q->whereHas('package_cost', function ($q) use ($filters) {
//                    $q->where('cost', '>=', $filters['price'][0])
//                        ->where('cost', '<=', $filters['price'][1]);
//                });
//            });
//        });
    }
}
