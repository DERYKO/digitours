<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'package_id',
        'promotion_type_id',
        'start',
        'end',
        'value_off',
        'qualification_instance',
        'added_by'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function promotion_type()
    {
        return $this->belongsTo(PromotionType::class);
    }
}
