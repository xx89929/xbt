<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocCash extends Model
{
    use SoftDeletes;

    protected $table = 'doc_cash';

    public function cash_doctor(){
        return $this->belongsTo(Doctor::class,'dortor_id');
    }

    public function cash_bank(){
        return $this->hasOne(Bank::class,'bank_id','bank_type');
    }
}
