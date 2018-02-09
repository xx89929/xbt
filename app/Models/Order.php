<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'xbt_order';

    protected $fillable = [
        'pro_id','order_id','member_id','doctor_id','store_id','pro_nub','deal_status','order_status','order_money','is_lock'
    ];


    public function relevancy_order_pro(){
        return $this->belongsTo(Product::class,'pro_id');
    }


    public function relevancy_order_user(){
        return $this->belongsTo(User::class,'member_id');
    }

    public function rele_order_doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function rele_order_store(){
        return $this->belongsTo(Store::class,'store_id');
    }

    public function scopeGetId($query,$id){
        return $query->where('id',$id);
    }


    public function scopeNonPay($query){
        return $query->where('pay_status',0);
    }

    public function scopeNonOrder($query){
        return $query->where('order_status',0);
    }

    public function scopeOrderInfo($q){
        return $q->with(['relevancy_order_pro' => function($query){
            $query->select('id','name','pics','price');
        },'relevancy_order_user' => function($query){
            $query->select('id','username');
        },'rele_order_doctor' => function($query){
            $query->select('id','realname');
        },'rele_order_store' => function($query){
            $query->select('id','name');
        }]);
    }
}
