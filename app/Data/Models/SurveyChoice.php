<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyChoice extends Model
{
    protected $fillable = [
        'survey_question_id',
        'choice',
        'added_by'
    ];

    public function survey_question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
