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
}
