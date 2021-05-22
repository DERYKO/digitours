<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'locality_id',
        'name'
    ];
}
