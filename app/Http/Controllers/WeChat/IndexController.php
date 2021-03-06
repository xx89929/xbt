<?php

namespace App\Http\Controllers\WeChat;

use App\Models\BannerSet;
use App\Models\CaseXb;
use App\Models\Doctor;
use App\Models\News;
use App\Models\NewsTage;
use App\Models\Product;
use App\Models\ServiceEnv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends BaseController
{
    public function index(){
        $index['banner'] = BannerSet::select('order','pic')->orderBy('order')->get()->each(function($banner){
            return $banner->pic = env('APP_URL').'/storage/'.$banner->pic;
        });
        $index['hot_product']  = Product::all()->take(6)->each(function($hp){
             $hp->picss = env('APP_URL').'/storage/'.$hp->pics[0];
             $hp->price = number_format($hp->price,2);
             $hp->name = str_limit($hp->name,20,'');
        });
        $index['news_tag'] = NewsTage::all();
        $index['news'] = News::all()->each(function ($new){
            $new->pic = env('APP_URL').'/storage/'.$new->pic;
        });
        $index['case'] = CaseXb::all()->take(9)->each(function ($case){
            $case->image = env('APP_URL').'/storage/'.$case->image;
            $case->name = str_limit($case->name,39);
        });

        $index['doctors'] = Doctor::select('id','realname','avatar','doc_group')->with(['doc_to_doc_group' =>function($query){
            $query->select('id','title');
        }])->take(4)->get()->each(function ($d){
            $d->avatar = env('APP_URL').'/storage/'.$d->avatar;
        });

        $index['serEnv'] = ServiceEnv::select('id','title','pic')->get()->each(function ($ser){
            $ser->pic = env('APP_URL').'/storage/'.$ser->pic;
        });
        return $index;
    }
}
