<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackageRequirement extends Model
{
    protected $fillable = [
        'package_id',
        'requirements',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
