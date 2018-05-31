<?php

namespace App\Http\Controllers\Wechat;

use App\Models\CaseCategory;
use App\Models\CaseXb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{

    public function index(){

        $case['category'] = CaseCategory::orderBy('order')->get();
        $case['case'] = CaseXb::select('name','id','describe','image','category')->get()->each(function($c){
            $c->image = env('APP_URL').'/storage/'.$c->image;

        });
        return $case;
    }
}
