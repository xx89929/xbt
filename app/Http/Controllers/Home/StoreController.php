<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\InitController;
use App\Models\Area;
use App\Models\Store;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends InitController
{
    public function index(Request $request){

        $hotStore = Store::select('name','store_pic')->take(6)->get();
        return view($this->iView.'.page.facade.index',['hotStore' => $hotStore,'headNav' => 'store']);
    }

    public function getBdMap(Request $request){
        $res = Store::whereBetween('lng', [$request->post('lbLng'), $request->post('rtLng')])->whereBetween('lat', [$request->post('lbLat'), $request->post('rtLat')])->get();
        return $res;exit;
    }

    public function storeList(Request $request){
        $myPoint = $this->getBaiduPoint($request);

        $store = Store::all();
        foreach ($store as $st){
            $st->province = Area::getid($st->province)->select('area_name')->first();
            $st->city = Area::getid($st->city)->select('area_name')->first();
            $st->district = Area::getid($st->district)->select('area_name')->first();
        }
        $this->pageTitle = '修巴堂店铺';
        return view($this->iView.'.page.store.index',['headNav' => 'store','pageTitle' => $this->pageTitle,'myPoint' => $myPoint,'store' => $store]);
    }

    public function storeInfo(Request $request){
        if(!$request->get('id')){
            return abort(404);
        }

        $myPoint = $this->getBaiduPoint($request);

        $store = Store::getid($request->get('id'))->first();
        $store->province = Area::getid($store->province)->select('area_name')->first();
        $store->city = Area::getid($store->city)->select('area_name')->first();
        $store->district = Area::getid($store->district)->select('area_name')->first();
        $this->pageTitle = $store->name;

        return view($this->iView.'.page.store_info.index',['headNav' => 'store','store' => $store,'pageTitle' => $this->pageTitle,'myPoint' => $myPoint]);
    }

    protected function getBaiduPoint(Request $request){
        $ip = $request->getClientIp();
//        $ip = '223.198.86.87';
        $client = new Client();
        $response = $client->get("http://api.map.baidu.com/location/ip?ip=".$ip.'&ak=GoRUSig6Ieb9CNnShGAkrHnVo46HK6dG&coor=bd09ll');
        $body = json_decode($response->getBody(),true);

        if($body['status'] == 0 ){
            $myPoint = $body['content']['point'];
        } else{
            $myPoint['x'] = '';
            $myPoint['y'] = '';
        }
        return $myPoint;
    }
}
