<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'latitude',
        'longitude',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
