<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserBucketList extends Model
{
    protected $fillable = [
        'user_id',
        'activity_id',
        'sub_activity_id',
        'complete'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function sub_activity()
    {
        return $this->belongsTo(SubActivity::class);
    }
}
