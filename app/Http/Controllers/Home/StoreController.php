<?php

namespace App\Http\Controllers\Home;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index(Request $request){

        $hotStore = Store::select('name','store_pic')->take(6)->get();
        return view('home.page.facade.index',['hotStore' => $hotStore]);
    }

    public function getBdMap(Request $request){
        $res = Store::whereBetween('lng', [$request->post('lbLng'), $request->post('rtLng')])->whereBetween('lat', [$request->post('lbLat'), $request->post('rtLat')])->get();
        return $res;exit;
    }
}
