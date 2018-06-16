<?php

namespace App\Http\Controllers\WeChat;

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

    public function login(){
        $userInfo = $this->getWxUserInfo();
        Log::info('wxuserInfo:'.gettype($userInfo));
        return $userInfo;
    }


    public function getWxUserInfo()
    {
        //code 在小程序端使用 wx.login 获取
        $code = request('code', '');

        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = request('encryptedData', '');
        $iv = request('iv', '');

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);

        //获取解密后的用户信息
        return $this->wxxcx->getUserInfo($encryptedData, $iv);
    }

    public function saveWxUserInfo(Request $request){
        if(!$request->get('openId')){
            return trans('wechat.param_error');
        }
        $saveUser = User::firstOrNew(['openId' => $request->get('openId')]);
        $saveUser->openId = $request->get('openId');
        $userSaveStat = $saveUser->save();
        return $userSaveStat;exit;
        if($userSaveStat){
           $userInfo =  User::where('openId',$request->get('openId'))->first();
           return $userInfo->id;
        }
    }
}
