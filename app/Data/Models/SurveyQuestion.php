<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $fillable = [
        'survey_id',
        'survey_question_type_id',
        'question',
        'added_by'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function survey_question_type()
    {
        return $this->belongsTo(SurveyQuestionType::class);
    }
}
