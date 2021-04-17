<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'value'
    ];
}
