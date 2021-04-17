<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionType extends Model
{
    protected $fillable = [
        'type',
        'key',
        'added_by'
    ];
}
