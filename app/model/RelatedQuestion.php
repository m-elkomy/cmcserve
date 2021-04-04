<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class RelatedQuestion extends Model
{
    protected $table = 'related_questions';
    protected $fillable = [
        'question_id',
        'related_questoin',
    ];


    public function question(){
        return $this->hasOne('App\model\AssessmentQuestion','id','related_questoin');
    }

    public function reg_question(){
        return $this->hasOne('App\model\AssessmentQuestion','id','question_id');
    }
}
