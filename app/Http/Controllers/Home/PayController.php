<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\InitController;
use App\Traits\AliPay;
use App\Traits\WechatPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends InitController
{
    Use AliPay,WechatPay;

    public function getPayWay(Request $request){
        if(!empty($request->post('pay_type'))){
            switch ($request->post('pay_type')){
                case '1':
                    return $this->alipay($request);
                    break;
                case '2':
                    return $this->wechatPay($request);
                    break;
            }
        }else{
            return back()->with('error','请选择支付方式');
        }
    }
}
