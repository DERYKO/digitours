<?php

namespace App\Data\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
        'user_id',
        'survey_question_id',
        'response'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function survey_question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
