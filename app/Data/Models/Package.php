<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'description',
        'cover_photo',
        'added_by'
    ];

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }
    public function package_cost(){
        return $this->hasOne(PackageCost::class);
    }
    public function package_exclusive(){
        return $this->hasOne(PackageExclusive::class);
    }
    public function package_inclusive(){
        return $this->hasOne(PackageInclusive::class);
    }
    public function package_feedback(){
        return $this->hasOne(PackageFeedback::class );
    }
    public function package_itinerary(){
        return $this->hasOne(PackageItinerary::class);
    }
    public function package_policy(){
        return $this->hasOne(PackagePolicy::class);
    }
    public function package_requirement(){
        return $this->hasOne(PackageRequirement::class);
    }
    public function package_sub_activity(){
        return $this->hasMany(PackageSubActivity::class);
    }
    public function scopeFilterBy($query,$filters){
        $query->when(isset($filters['search']), function ($query) use ($filters){
            $query->where('description', 'like', '%'.$filters['search'].'%');
        });
    }
}
