<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'xbt_store';


    protected $casts = [
        'doctor' => 'json',
    ];

    public function setPicturesAttribute($doctor)
    {
        if (is_array($doctor)) {
            $this->attributes['doctor'] = json_encode($doctor);
        }
    }

    public function getPicturesAttribute($doctor)
    {
        return json_decode($doctor, true);
    }


    public function doctor_many(){
        return $this->hasMany(User::class,'id','doctor');
    }
}
