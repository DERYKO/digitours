<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackageInclusive extends Model
{
    protected $fillable = [
        'package_id',
        'inclusive',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

}
