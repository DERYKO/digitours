<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'package_id',
        'name',
        'description',
        'start',
        'end',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
