<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class RelatedRegulations extends Model
{
    protected $table = 'related_regulations';
    protected $fillable = [
        'regulations_id',
        'related_regulations',
    ];


    public function regulations(){
        return $this->hasOne('App\model\Regulations','id','related_regulations');
    }

    public function reg_regulations(){
        return $this->hasOne('App\model\Regulations','id','regulations_id');
    }
}
