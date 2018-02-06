<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;

class AliPayController extends Controller
{
    protected $config;

    public function __construct()
    {
        $this->config = config('pay.alipay');
    }


    public function alipay()
    {
        $config_biz = [
            'out_trade_no' => time(),
            'total_amount' => '0.1',
            'subject'      => 'test subject',
        ];

        $pay = Pay::alipay($this->config)->web($config_biz);

        return $pay;
    }

    public function return(Request $request)
    {
        $pay = new Pay($this->config);

        return $pay->driver('alipay')->gateway()->verify($request->all());
    }

    public function notify(Request $request)
    {
        $pay = new Pay($this->config);

        if ($pay->driver('alipay')->gateway()->verify($request->all())) {
            file_put_contents(storage_path('notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单号：' . $request->out_trade_no . "\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单金额：' . $request->total_amount . "\r\n\r\n", FILE_APPEND);
        } else {
            file_put_contents(storage_path('notify.txt'), "收到异步通知\r\n", FILE_APPEND);
        }

        echo "success";
    }
}
