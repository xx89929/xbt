<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\InitController;
use App\Models\MemberInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends InitController
{
    public function index(){
        $this->pageTitle = '会员信息';
        return view($this->authView.'.page.info',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function save(Request $request){
        if($request->hasFile('head_pic')){
            $data['head_pic'] = $request->file('head_pic')->store('user/avatars','public');
        };
        $data['nickname'] = $request->post('nickname');
        $info = MemberInfo::where('member_id',Auth::id());
        $res = $info->update($data);
        return $res ?  back()->with('status','保存成功') : back()->with('status','保存失败');
    }

    public function uploadAvatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar_path = $request->file('avatar')->store('user/avatars','public');
            $info = MemberInfo::where('member_id',Auth::id())->first();
            $info->head_pic = $avatar_path;
            $res = $info->save();
            return $res ?  back()->with('success','保存成功') : back()->with('error','保存失败');
        };
    }
}
