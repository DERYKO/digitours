<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionType extends Model
{
    protected $fillable = [
      'name',
      'slug'
    ];
}
