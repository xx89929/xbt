<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\InitController;
use App\Models\BannerSet;
use App\Models\CaseXb;
use App\Models\Doctor;
use App\Models\News;
use App\Models\ProCategory;
use App\Models\Product;
use App\Models\ServiceEnv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends InitController
{

    public function index(){
        $proNav = ProCategory::select('id','title')->orderBy('order')->get();

        $product = Product::select('id','name','price','pics','description','category_id')->get();

        $this->isMb ? $hot_product = $product->take(6)->all() : $hot_product = $product->take(5)->all();
        $doctors = Doctor::select('id','realname','avatar','doc_group')->with(['doc_to_doc_group' =>function($query){
            $query->select('id','title');
        }])->take(3)->get();

        $news = News::select('id','title','tag','describes','updated_at','pic')->ispush()->isnews()->with(['news_tag_one' => function($query){
            $query->select('id','name');
        }])->get();

        $salon = News::select('id','title','tag','describes','pic')->ispush()->issalon()->with(['news_tag_one' => function($query){
            $query->select('id','name');
        }])->take(2)->get();

        $dynamic = News::select('id','title','tag','describes','pic')->ispush()->isdynamic()->with(['news_tag_one' => function($query){
            $query->select('id','name');
        }])->take(6)->get();

        $case = CaseXb::select('id','name','describe','image','category')->with(['CaseCateOne' => function($query){
            $query->select('id','title');
        }])->take(8)->get();

        $serviceEnv = ServiceEnv::select('id','title','pic')->take(6)->get();

        $banner = BannerSet::select('order','pic')->orderBy('order')->get();


        return view($this->iView.'.page.index.index',['product' => $product,'Doctor' => $doctors,'news' => $news,'case' => $case,'salon' => $salon,'dynamic' => $dynamic,'proNav' => $proNav,'serviceEnv' => $serviceEnv,'hot_product' =>$hot_product,'banner' => $banner,'headNav' => 'index']);
    }
}
