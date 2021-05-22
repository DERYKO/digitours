<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = [
      'region_id',
      'name'
    ];
}
