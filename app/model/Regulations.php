<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Regulations extends Model
{
    protected $table = 'regulations';
    protected $fillable = [
        'article_text_status_ar',
        'article_text_status_en',
        'search_keyword_ar',
        'search_keyword_en',
        'regulation_type_ar',
        'regulation_type_en',
        'regulation_name_ar',
        'regulation_name_en',
        'article_text_ar',
        'article_text_en',
        'regulation_year',
        'regulation_number',
        'article_number',
        'attachment',
    ];

    public function related_regulations(){
        return $this->hasMany('App\model\RelatedRegulations','regulations_id','id');
    }
}
