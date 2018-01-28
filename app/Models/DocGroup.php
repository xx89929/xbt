<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocGroup extends Model
{
    protected $table = 'doc_group';

    public $timestamps = false;

    public function doc_group_doc(){
        return $this->hasMany(Doctor::class,'doc_group','id');
    }

}
