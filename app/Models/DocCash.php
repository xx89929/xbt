<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocCash extends Model
{
    use SoftDeletes;

    protected $table = 'doc_cash';

    protected $fillable = [
        'doctor_id','goods','bank_type','bank_branch','bank_code'
    ];

    public function cash_doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function cash_bank(){
        return $this->hasOne(Bank::class,'bank_id','bank_type');
    }
}
