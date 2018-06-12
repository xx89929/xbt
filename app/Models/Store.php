<?php

namespace App\Models;

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

    public function scopeGetId($query,$id){
        return $query->where('id',$id);
    }


    public function store_doctor(){
        return $this->hasMany(Doctor::class,'be_store','id');
    }
}
