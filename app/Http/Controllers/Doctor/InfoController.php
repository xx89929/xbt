<?php

namespace App\Http\Controllers\Doctor;


use App\Http\Controllers\InitController;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends InitController
{
    public function index(){
        $this->pageTitle = '医师信息';
        return view($this->docView.'.page.info',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function save(Request $request){
        if($request->hasFile('head_pic')){
            $data['avatar'] = $request->file('head_pic')->store('doc/avatars','public');
        };
        $data['realname'] = $request->post('realname');
        $info = Doctor::where('id',Auth::guard()->user()->id);
        $res = $info->update($data);
        return $res ?  back()->with('success','医生资料保存成功') : back()->with('error','医生资料保存失败');
    }
}
