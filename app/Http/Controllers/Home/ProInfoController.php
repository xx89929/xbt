<?php

namespace App\Http\Controllers\Home;

use App\Models\Area;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProInfoController extends Controller
{
    public function index(Request $request){
        $province = Area::province()->get();
        if($request->get('id')){
            $proin = Product::where('id',$request->get('id'))->first();
        }else{
            abort(404);
        }
        $tui_pro = Product::all()->random(2);

        return view('home.page.pro-info.index',['proin' => $proin,'province' => $province,'tui_pro' => $tui_pro,'headNav' => 'product']);
    }
}
