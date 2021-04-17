<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PackageRating extends Model
{
    protected $fillable = [
        'package_id',
        'user_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
