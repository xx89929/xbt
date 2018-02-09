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
            $news = News::select('id','pic','title','updated_at','describes')->newsTag($request->get('tag_id'))->isPush()->paginate(8)->withPath('?tag_id='.$request->get('tag_id'));
        }else{
            $news = News::select('id','pic','title','updated_at','describes')->isPush()->paginate(8);
        }

        return view('home.page.news.index',['newTag' => $newTages,'news' => $news,'headNav' => 'news']);
    }


    public function item(Request $request){
        if($request->get('id')){
            News::newsId($request->get('id'))->increment('read_num');
            $news = News::newsId($request->get('id'))->first();
            $news_pre = News::where('id','<',$request->get('id'))->select('id','title')->orderBy('id','desc')->first();
            $news_next = News::where('id','>',$request->get('id'))->select('id','title')->first();
            $news_rem = News::select('id','title')->orderBy('id','desc')->take(6)->get();
        }
        return view('home.page.news_item.index',['news' => $news,'news_pre' => $news_pre, 'news_next' => $news_next,'news_rem' => $news_rem,'headNav' => 'news']);
    }
}
