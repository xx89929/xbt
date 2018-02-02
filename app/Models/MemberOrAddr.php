<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MemberOrAddr extends Model
{
    public $timestamps = false;
    protected $table = 'member_order_address';
    protected $fillable = [
        'member_id','province','city','district','address'
    ];


    public function rele_addr_member(){
        return $this->belongsTo(User::class,'member_id');
    }

    public function scopeUserID($query,$id){
        return $query->where('member_id',$id);
    }

    public function rele_addr_area(){
        return $this->belongsTo(Area::class);
    }
}