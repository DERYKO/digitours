<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    protected $fillable = [
        'activity_id',
        'name',
        'cover_photo',
        'added_by'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
