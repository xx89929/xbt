<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberInfo extends Model
{
    protected $table = 'member_info';

    protected $fillable = [
        'member_id','type','head_pic','nickname'
    ];


    public function to_user(){
        return $this->belongsTo(User::class,'member_id');
    }



}
