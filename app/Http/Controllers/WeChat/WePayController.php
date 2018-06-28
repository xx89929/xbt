<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Doctor;
use App\Models\Order;
use App\Models\Store;
use App\Traits\WechatPay;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;

class WePayController extends Controller
{
    use WechatPay;

    public function miniappPay(Request $request){
        if(!$request->post('orderParam')){
            return false;
        }
        $orderParam = $request->post('orderParam');

        $order = [
            'out_trade_no' => time(),
            'body' => 'subject-测试',
            'total_fee' => '1',
            'openid' => $orderParam['openId'],
        ];

        $orderParam['total'] = str_replace(',','',$orderParam['total']);


        $orderCreate = $this->orderParam($orderParam,$order);

        return $orderCreate ? Pay::wechat($this->config)->miniapp($order) : false;
    }

    protected function orderParam($orderParam,$orderPay){
        $uId = User::where('openId',$orderParam['openId'])->first();
        $doc = Doctor::where('realname','like',"%".$orderParam['doctor']."%")->first();
        $store = Store::where('name','like',"%".$orderParam['store']."%")->first();
        $order = new Order;
        $order->order_id = $orderPay['out_trade_no'];
        $order->pro_id = $orderParam['proId'];
        $order->member_id = $uId->id;
        $order->doctor_id = $doc->id;
        $order->store_id = $store->id;
        $order->subject = $orderPay['body'];
        $order->pro_nub = $orderParam['nub'];
        $order->pay_status = 0;
        $order->order_money = $orderParam['total'];
        $order->take_name = $orderParam['takeRealname'];
        $order->take_phone = $orderParam['takePhone'];
        $order->take_address = $orderParam['takeAddress'];
        $order->pay_way = 'wePay';
        $res = $order->save();
        return $res;
    }

    public function orderPayStatusUpdate(Request $request){
        $status = $request->post('status');
        $order_id = $request->post('order_id');
        if($status == 1 || $status == '1'){
            Order::where('order_id',$order_id)->update(['pay_status' => 1,'pay_at' => Carbon::now()]);
        }
    }


}
