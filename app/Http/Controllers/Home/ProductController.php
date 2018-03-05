<?php

namespace App\Http\Controllers\Home;

use App\Models\ProCategory;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request){
        $proNav = ProCategory::orderBy('order')->get();
        if($request->get('cate_id')){
            $product = Product::select('name','price','pics','id','specification','description')->where('category_id',$request->get('cate_id'))->paginate(6)->withPath('?cate_id='.$request->get('cate_id'));
        }elseif($request->get('pro_name')){
            $name = $request->get('pro_name');
            $product = Product::select('name','price','pics','id','specification','description')->where('name','like',"%$name%")->paginate(6)->withPath('?name='.$name);
        }
        else{
            $product = Product::select('name','price','pics','id','specification','description')->paginate(6);
        }
        $tui_pro = Product::all()->random(2);
        return view('home.page.product.index',['product' => $product,'proNav' => $proNav,'headNav' => 'product','tui_pro' => $tui_pro]);
    }
}
