<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
      'name',
      'cover_photo',
      'added_by'
    ];
}
