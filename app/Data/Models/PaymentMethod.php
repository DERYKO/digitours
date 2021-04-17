<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
      'name',
      'status',
      'added_by'
    ];
}
