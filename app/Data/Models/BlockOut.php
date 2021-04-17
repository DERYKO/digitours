<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class BlockOut extends Model
{
    protected $fillable = [
        'package_id',
        'start_day',
        'end_day',
        'recurrence_rule',
        'reason',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
