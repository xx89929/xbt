<?php

namespace App;

use App\Models\MemberInfo;
use App\Models\MemberOrAddr;
use App\Models\MemberType;
use App\Models\Order;
use App\Models\PayLog;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function member_info_one(){
        return $this->hasOne(MemberInfo::class,'member_id','id');
    }

    public function member_type_one(){
        return $this->hasOne(MemberType::class,'id','type');
    }


    public function order_address(){
        return $this->hasOne(MemberOrAddr::class,'member_id','id');
    }

    public function user_pay_log(){
        return $this->hasMany(PayLog::class,'member_id','id');
    }

    public function scopeType($query,$type){
        if (!$type) {
            return $query;
        }

        return $query->whereHas('member_info_one', function ($query) use ($type) {
            $query->where('type',  $type);
        });
    }

    public function rele_member_order(){
        return $this->hasMany(Order::class,'member_id','id');
    }
}
