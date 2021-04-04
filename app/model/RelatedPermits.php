<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class RelatedPermits extends Model
{
    protected $table = 'related_permits';
    protected $fillable = [
        'permits_id',
        'related_permits',
    ];


    public function permits(){
        return $this->hasOne('App\model\Permits','id','related_permits');
    }

    public function reg_permits(){
        return $this->hasOne('App\model\Permits','id','permits_id');
    }
}
