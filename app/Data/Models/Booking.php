<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'package_cost_id',
        'notes',
        'start',
        'end',
        'payment_status',
        'booking_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function package_cost()
    {
        return $this->belongsTo(PackageCost::class);
    }
}
