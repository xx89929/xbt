<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseXb extends Model
{
    protected $table = 'case';



    public function CaseCateOne()
    {
        return $this->hasOne(CaseCategory::class,'id','category');
    }
}
