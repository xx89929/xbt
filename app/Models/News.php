<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';


    public function news_tag_one(){
        return $this->hasOne(NewsTage::class,'id','tag');
    }
}
