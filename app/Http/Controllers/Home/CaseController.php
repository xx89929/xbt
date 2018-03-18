<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\InitController;
use App\Models\CaseCategory;
use App\Models\CaseXb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends InitController
{
    public function index(Request $request){
        $caseActive = null;
        $caseNav = CaseCategory::orderBy('order')->get();
        if($request->get('id')){
            $case = CaseXb::select('name','id','describe','image')->caseCategory($request->get('id'))->paginate(12)->withPath('?id='.$request->get('id'));
            $caseActive = $request->get('id');
        }else{
            $case = CaseXb::select('name','id','describe','image')->paginate(12);
        }
        $this->pageTitle = '修巴堂案例';
        return view($this->iView.'.page.case.index',['caseNav' => $caseNav,'case' => $case,'caseActive' => $caseActive,'headNav' => 'case','pageTitle' => $this->pageTitle]);
    }


    public function caseInfo(Request $request){
        if(!$request->get('case_id')){
            return abort(404,'请输入正确地址');
        };
        $caseInfo = CaseXb::id($request->get('case_id'))->first();
        $caseInfo_pre = CaseXb::where('id','<',$request->get('case_id'))->select('id','name')->orderBy('id','desc')->first();
        $caseInfo_next = CaseXb::where('id','>',$request->get('case_id'))->select('id','name')->first();
        $caseNever = CaseXb::orderBy('updated_at','desc')->take(5)->get();
        $this->pageTitle = '案例详情';
        return view($this->iView.'.page.case_info.index',['caseInfo' => $caseInfo,'caseInfo_pre' => $caseInfo_pre,'caseInfo_next' => $caseInfo_next,'caseNever' => $caseNever,'headNav' => 'case','pageTitle' => $this->pageTitle]);
    }
}
