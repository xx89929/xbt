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
        'pro_id','order_id','member_id','doctor_id','store_id','pro_nub','deal_status','order_status','order_money'
    ];


    public function relevancy_order_pro(){
        return $this->hasOne(Product::class,'id','pro_id');
    }


    public function relevancy_order_user(){
        return $this->hasOne(User::class,'id','member_id');
    }
}
