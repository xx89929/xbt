<?php

namespace App\Http\Controllers\Home;

use App\Models\CaseCategory;
use App\Models\CaseXb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function index(Request $request){
        $caseNav = CaseCategory::orderBy('order')->get();
        if($request->get('id')){
            $case = CaseXb::select('name','id','describe','image')->caseCategory($request->get('id'))->paginate(12)->withPath('?id='.$request->get('id'));
        }else{
            $case = CaseXb::select('name','id','describe','image')->paginate(12);
        }
        return view('home.page.case.index',['caseNav' => $caseNav,'case' => $case]);
    }
}
