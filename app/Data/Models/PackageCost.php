<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCost extends Model
{
    protected $fillable = [
        'package_id',
        'description',
        'cost',
        'minimum_deposit',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
