<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';


    public function news_tag_one(){
        return $this->hasOne(NewsTage::class,'id','tag');
    }

    public function scopeIsPush($query){
        return $query->where('is_push',1);
    }

    public function scopeIsSalon($query){
        return $query->where('tag',3);
    }

    public function scopeIsDynamic($query){
        return $query->where('tag',1);
    }

    public function scopeNewsId($query,$id){
        return $query->where('id',$id);
    }

    public function scopeIsNews($query){
        return $query->where('tag',2);
    }

    public function scopeNewsTag($query,$tagId){
        return $query->where('tag',$tagId);
    }
}
