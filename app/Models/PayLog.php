<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PayLog extends Model
{
    protected $table = 'pay_log';


    public function play_log_user(){
        return $this->belongsTo(User::class,'member_id');
    }

    public function pay_log_options(){
        return $this->hasOne(PayLogOptions::class,'id','operation');
    }
}
