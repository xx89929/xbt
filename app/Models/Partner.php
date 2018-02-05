<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected  $fillable = [
        'name','phone','des'
    ];
    protected $table = 'xbt_partner';
}
