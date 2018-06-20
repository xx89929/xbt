<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $casts = [
        'pics' => 'json',
    ];


    public function setPicsAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['pics'] = json_encode($pictures);
        }
    }

    public function getPicsAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public function pro_category_one(){
        return $this->hasOne(ProCategory::class,'id','category_id');
    }

    public function rele_pro_order(){
        return $this->hasMany(Order::class,'pro_id','id');
    }

    public function scopeProId($query,$id){
        return $query->where('id',$id);
    }
}
