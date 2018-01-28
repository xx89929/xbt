<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'xbt_order';


    public function relevancy_order_pro(){
        return $this->hasOne(Product::class,'id','pro_id');
    }


    public function relevancy_order_user(){
        return $this->hasOne(User::class,'id','member_id');
    }
}
