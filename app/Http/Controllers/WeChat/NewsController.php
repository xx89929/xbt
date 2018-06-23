<?php

namespace App\Http\Controllers\Wechat;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){

    }

    public function newsInfo(Request $request){
        if(!$request->get('id')){
            return false;
        }
        $newsInfo = News::find($request->get('id'));

        return $newsInfo ? $newsInfo : null;
    }
}
