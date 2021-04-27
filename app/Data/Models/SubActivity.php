<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'activity_id',
        'name',
        'cover_photo',
        'added_by'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id','id');
    }
}
