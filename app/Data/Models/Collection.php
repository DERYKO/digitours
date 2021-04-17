<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'package_cost_id',
        'payment_method_id',
        'status',
        'amount',
        'balance'
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
