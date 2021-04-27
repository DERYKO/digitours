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

    public function package(){
        return $this->hasMany(Package::class,'travel_destination_id','id');
    }

    public function scopeFilterBy($query,$filters){
        $query->when(isset($filters['search']), function ($query) use ($filters){
            $query->where('name', 'like', '%'.$filters['search'].'%');
            $query->OrWhere('address', 'like', '%'.$filters['search'].'%');
            $query->OrWhere('latitude', 'like', '%'.$filters['search'].'%');
            $query->OrWhere('longitude', 'like', '%'.$filters['search'].'%');
            $query->OrWhereHas('package', function ($q) use ($filters){
                $q->where('description', 'like','%'.$filters['search'].'%');
            });
        });
    }
}
