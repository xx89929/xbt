<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocPay extends Model
{
    protected $table = 'doc_pay';


    public function to_doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function docpay_payset(){
        return $this->hasOne(PayLogOptions::class,'id','operation');
    }

}
