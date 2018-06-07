<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $ProList['list'] = Product::all()->each(function($p){
            $p->picss = env('APP_URL').'/storage/'.$p->pics[0];
            $p->name = str_limit($p->name,60);
            $p->price = number_format($p->price,2);

        });
        return $ProList;
    }

    public function getProInfo(Request $request){
        if($request->get('id')){
            $ProInfo = Product::ProId($request->get('id'))->first();
            $ProInfo->price = number_format($ProInfo->price,2);
            $ProInfo->pro_info = preg_replace('/<iframe(.*)iframe>/' , '',$ProInfo->pro_info);
            return $ProInfo;
        }
    }
}