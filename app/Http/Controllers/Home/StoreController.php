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
            $st->distance = $this->getDistance($myPoint['y'],$myPoint['x'],$st->lat,$st->lng);
        }

        $storeSort = $store->sortBy('distance')->values()->all();

        $this->pageTitle = '修巴堂店铺';
        return view($this->iView.'.page.store.index',['headNav' => 'store','pageTitle' => $this->pageTitle,'myPoint' => $myPoint,'store' => $storeSort]);
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
//        $ip = $request->getClientIp();
        $ip = '223.198.86.87';
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

//    protected function getBaiduDistance($a_lat,$a_lng,$b_lat,$b_lng){
//            //由于php的pi() 与 js的Math.PI的差异，为保证和JS计算的值统一故直接使用近似值
//            $a = 3.141592653589793 * $this->OD($a_lat, -180, 180) / 180;
//            $b = 3.141592653589793 * $this->OD($b_lat, -180, 180) / 180;
//            $c = 3.141592653589793 * $this->SD($a_lng, -74, 74) / 180;
//            $d = 3.141592653589793 * $this->SD($b_lng, -74, 74) / 180;
//            return 6370996.81 * acos(sin($c) * sin($d) + cos($c) * cos($d) * cos($b-$a));
//    }
//
//    protected function OD($a, $b, $c) {
//        while ($a > $c) $a -= $c - $b;
//        while ($a < $b) $a += $c - $b;
//        return $a;
//    }
//    protected function SD($a, $b, $c) {
//        $b != null && ($a = max($a, $b));
//        $c != null && ($a = min($a, $c));
//        return $a;
//    }

    //根据 经纬度 获取距离
    protected function getDistance($lat1=0,$lng1=0,$lat2=0,$lng2=0)
    {
        $ak = 'GoRUSig6Ieb9CNnShGAkrHnVo46HK6dG';
//        $url = 'http://api.map.baidu.com/routematrix/v2/driving?output=json&origins='.$lat1.','.$lng1.'&destinations='.$lat2.','.$lng2.'&ak='.$ak;
        $client = new Client();
        $response = $client->get("http://api.map.baidu.com/routematrix/v2/driving?output=json&origins=$lat1,$lng1&destinations=$lat2,$lng2&ak=$ak");
        $body = json_decode($response->getBody(),true);
        $result = $body['result'][0]['distance']['value'];
        return $result;
    }
}
