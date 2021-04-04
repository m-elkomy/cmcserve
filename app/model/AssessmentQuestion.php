<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    protected $table = 'assessment_questions';
    protected $fillable = [
        'question_ar',
        'question_en',
        'answer_ar',
        'answer_en',
    ];
}
