<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $table = 'doctors';

    protected $fillable = [
        'account','password','realname'
    ];

    protected $hidden = [
        'password','remember_token'
    ];


    public function doc_to_doc_group(){
        return $this->belongsTo(DocGroup::class,'doc_group');
    }


    /**
     * 已审核
     * @param $query
     * @return mixed
     */
    public function scopeCheckon($query){
        return $query->where('is_check',1);
    }

    public function doc_to_store(){
        return $this->belongsTo(Store::class,'be_store');
    }

    public function doc_doc_pay(){
        return $this->hasMany(DocPay::class,'doctor_id','id');
    }

    public function doc_cash(){
        return $this->hasMany(DocCash::class,'dortor_id','id');
    }

    public function scopeGetId($query,$id){
        return $query->where('id',$id);
    }
}
