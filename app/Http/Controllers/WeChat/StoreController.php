<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index(){
        $res = Store::all()->each(function ($S){
            $S->store_pic = env('APP_URL').'/storage/'.$S->store_pic;
        });
        return $res;
    }
}
