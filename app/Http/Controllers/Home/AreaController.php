<?php

namespace App\Http\Controllers\Home;

use App\Models\Area;
use App\Models\Doctor;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{

    public function city(Request $request)
    {
        $provinceId = $request->get('q');
        return Area::where('parent_id', $provinceId)->get(['id', DB::raw('area_name as text')]);
    }
    public function district(Request $request)
    {
        $cityId = $request->get('q');
        return Area::where('parent_id', $cityId)->get(['id', DB::raw('area_name as text')]);
    }

    public function areaStore(Request $request){
        $district = $request->get('q');
        return Store::where('district',$district)->get(['id', DB::raw('name as text')]);
    }

    public function getAreaDoc(Request $request){
        $Store = $request->get('q');
        return Doctor::where('be_store',$Store)->get(['id', DB::raw('realname as text')]);
    }
}
