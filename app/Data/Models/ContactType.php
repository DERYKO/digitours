<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $fillable = [
        'name',
        'type',
        'added_by'
    ];
}
