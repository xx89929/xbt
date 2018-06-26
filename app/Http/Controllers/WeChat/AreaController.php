<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Area;
use App\Models\Doctor;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function regionGetStore(Request $request){
        if(!$request->get('region')){
            return false;
        }
        $region = $request->get('region');
        $region[2] == '' ?  $regionOption = $region[1] : $regionOption = $region[2];
        $areaOne = Area::where('area_name','like',"%$regionOption%")->first();
        if(empty($areaOne)) {
            return '';
        }

        $store = Store::where('district',$areaOne->id)->orWhere('city',$areaOne->id)->pluck('name');
        return $store ? $store : null;
    }

    public function storeGetDoc(Request $request){
        if(!$request->get('store')){
            return false;
        }
        $store = $request->get('store');
        $beStore = Store::where('name','like',"%$store%")->first();

        if(empty($beStore) || empty($store)) {
            return '';
        }
        $docs = Doctor::where('be_store',$beStore->id)->pluck('realname');
        return $docs ? $docs : null;
    }
}
