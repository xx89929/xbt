<?php

namespace App\Http\Controllers\Home;

use App\Models\News;
use App\Models\NewsTage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(Request $request){
        $newTages = NewsTage::select('name','id')->get();
        if($request->get('tag_id')){
            $news = News::select('pic','title','updated_at','describes')->newsTag($request->get('tag_id'))->isPush()->paginate(8)->withPath('?tag_id='.$request->get('tag_id'));
        }else{
            $news = News::select('pic','title','updated_at','describes')->isPush()->paginate(8);
        }

        return view('home.page.news.index',['newTag' => $newTages,'news' => $news,'PicPath' => $this->adminPicPath,]);
    }
}
