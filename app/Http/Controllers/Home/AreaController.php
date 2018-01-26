<?php

namespace App\Http\Controllers\Home;

use App\Models\Area;
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
}
