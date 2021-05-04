<?php

namespace App\Data\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class SubActivity extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'activity_id',
        'name',
        'cover_photo',
        'added_by'
    ];

    public function getCoverPhotoAttribute($value)
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

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
}
