<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
    protected $fillable = [
            'name',
            'size',
            'file',
            'path',
            'full_file',
           'mime_type',
           'file_type',
           'relation_id',
    ];
}
