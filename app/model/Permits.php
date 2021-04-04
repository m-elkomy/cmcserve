<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Permits extends Model
{
    protected $table = 'permits';
    protected $fillable = [
        'article_text_status_ar',
        'article_text_status_en',
        'search_keyword_ar',
        'search_keyword_en',
        'regulation_type_ar',
        'permits_type_ar',
        'permits_type_en',
        'permits_name_ar',
        'permits_name_en',
        'article_text_ar',
        'article_text_en',
        'permits_year',
        'permits_number',
        'article_number',
        'attachment',
    ];
}
