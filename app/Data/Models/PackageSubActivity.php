<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PackageSubActivity extends Model
{
    protected $fillable = [
        'package_id',
        'sub_activity_id',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function sub_activity()
    {
        return $this->belongsTo(SubActivity::class);
    }
}
