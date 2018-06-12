<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Area;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index(){
        $res = Store::all()->each(function ($S){
            $S->store_pic = env('APP_URL').'/storage/'.$S->store_pic;
            $S->province = Area::GetId($S->province)->first();
            $S->city = Area::GetId($S->city)->first();
            $S->district = Area::GetId($S->district)->first();
        });
        return $res;
    }
}
