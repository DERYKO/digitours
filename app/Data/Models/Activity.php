<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
      'name',
      'cover_photo',
      'added_by'
    ];

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
