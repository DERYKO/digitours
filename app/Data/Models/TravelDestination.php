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

    public function scopeFilterBy($query,$filters){
        $query->when(isset($filters['search']), function ($query) use ($filters){
            $query->where('name', 'like', '%'.$filters['search'].'%');
            $query->OrWhere('address', 'like', '%'.$filters['search'].'%');
            $query->OrWhere('latitude', 'like', '%'.$filters['search'].'%');
            $query->OrWhere('longitude', 'like', '%'.$filters['search'].'%');
        });
    }
}
