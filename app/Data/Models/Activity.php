<?php

namespace App\Data\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Activity extends Model
{
    protected $fillable = [
      'name',
      'cover_photo',
      'added_by'
    ];

    public function getCoverPhotoAttribute($value)
    {
        if ($value && !str_contains($value,'http')) {
            return URL::to('storage/' . $value);
        }else{
            return $value;
        }
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->toDayDateTimeString();
    }

    public function sub_activity(){
        return $this->hasMany(SubActivity::class, 'activity_id','id');
    }

    public function scopeFilterBy($query,$filters){
        $query->when(isset($filters['search']), function ($query) use ($filters){
           $query->where('name', 'like', '%'.$filters['search'].'%')
               ->orWhereHas('sub_activity' ,function($q) use ($filters){
               $q->where('name', 'like', '%'.$filters['search'].'%');
            });
        });
    }
}
