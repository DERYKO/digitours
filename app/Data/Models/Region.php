<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
      'country_id',
      'name'
    ];
}
