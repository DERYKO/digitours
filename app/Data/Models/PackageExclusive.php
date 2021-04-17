<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackageExclusive extends Model
{
    protected $fillable = [
        'package_id',
        'exclusive',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
