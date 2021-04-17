<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PackageFeedback extends Model
{
    protected $fillable = [
        'package_id',
        'user_id',
        'comment',
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
