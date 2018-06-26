<?php

namespace App\Http\Controllers\WeChat;

use App\Traits\WechatPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;

class WePayController extends Controller
{
    use WechatPay;

    public function miniappPay(Request $request){
        $order = [
            'out_trade_no' => time(),
            'body' => 'subject-测试',
            'total_fee' => '1',
            'openid' => $request->get('openId'),
        ];
        return $result = Pay::wechat($this->config)->miniapp($order);
    }
}
