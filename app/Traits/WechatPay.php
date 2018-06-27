<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Yansongda\Pay\Pay;

trait WechatPay
{
    protected $config = [
        'appid' => '', // APP APPID
        'app_id' => '', // 公众号 APPID
        'miniapp_id' => 'wxe68abfc1d61db371', // 小程序 APPID
        'mch_id' => '1499477092',
        'key' => 'BEySsZm2VlLPqcC2xUqdhvDibiRDsRNW',
        'notify_url' => 'http://yanda.net.cn/notify.php',
        'cert_client' => './cert/apiclient_cert.pem', // optional，退款等情况时用到
        'cert_key' => './cert/apiclient_key.pem',// optional，退款等情况时用到
        'log' => [ // optional
            'file' => './logs/wechat.log',
            'level' => 'debug'
        ],
        'mode' => 'dev', // optional, dev/hk;当为 `hk` 时，为香港 gateway。
        'sign' => '',
    ];




    protected function wechatPay(Request $request)
    {
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
            'openid' => 'onkVf1FjWS5SBIixxxxxxx',
        ];

        $pay = Pay::wechat($this->config)->mp($order);

        // $pay->appId
        // $pay->timeStamp
        // $pay->nonceStr
        // $pay->package
        // $pay->signType
    }

    public function notify()
    {
        $pay = Pay::wechat($this->config);

        try{
            $data = $pay->verify(); // 是的，验签就这么简单！

            Log::debug('Wechat notify', $data->all());
        } catch (Exception $e) {
            // $e->getMessage();
        }

        //return $pay->success()->send();// laravel 框架中请直接 `return $pay->success()`
        return $pay->success();// laravel 框架中请直接 `return $pay->success()`
    }
}
