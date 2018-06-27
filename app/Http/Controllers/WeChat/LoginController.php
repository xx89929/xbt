<?php

namespace App\Http\Controllers\WeChat;

use App\Models\MemberInfo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Iwanli\Wxxcx\Wxxcx;

class LoginController extends Controller
{
    protected $wxxcx;

    function __construct(Wxxcx $wxxcx)
    {
        $this->wxxcx = $wxxcx;
    }

    public function login(Request $request){
        $EncodeuserInfo = $this->getWxUserInfo($request);
        $userInfo = json_decode($EncodeuserInfo);
        if($userInfo->openId){
            return $this->saveWxUserInfo($userInfo) ? $EncodeuserInfo : false;
        }
    }


    public function getWxUserInfo(Request $request)
    {
        //code 在小程序端使用 wx.login 获取
//        $code = request('code', '');
        $code = $request->post('code');

        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = request('encryptedData', '');
        $iv = request('iv', '');

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);

        //获取解密后的用户信息
        return $this->wxxcx->getUserInfo($encryptedData, $iv);
    }

    public function saveWxUserInfo($UserInfo){

        $saveUser = User::firstOrNew(['openId' => $UserInfo->openId]);
        $saveUser->openId = $UserInfo->openId;
        $userSaveStat =  $saveUser->save();
        if($userSaveStat){
            $memberInfo = MemberInfo::firstOrNew(['member_id' => $saveUser->id]);
            $memberInfo->nickname = $UserInfo->nickName;
            $Info = $memberInfo->save();
            return $Info ? $Info : false;
        }
//        $memberInfo = MemberInfo::firstOrNew(['member_id' => $saveUser->id]);
//        return $memberInfo;
//        $saveUser->openId = $request->get('openId');
//        $userSaveStat = $saveUser->save();
//        if($userSaveStat){
//           $userInfo =  User::where('openId',$request->get('openId'))->first();
//           return $userInfo->id;
//        }
    }
}
