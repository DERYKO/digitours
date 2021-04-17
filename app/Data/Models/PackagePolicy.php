<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackagePolicy extends Model
{
    protected $fillable = [
        'package_id',
        'policy',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
