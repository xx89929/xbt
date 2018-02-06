<?php

namespace App\Http\Controllers\Home;

use App\Models\DocPay;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Runner\Exception;
use Yansongda\Pay\Pay;

class AliPayController extends Controller
{
    protected $config;

    protected $data;

    public function __construct()
    {
        $this->config = config('pay.alipay');
    }


    public function alipay(Request $request)
    {
        if(!$request->except('_token')){
            return back()->with('error','参数错误');
        }

        $data = $request->except('_token');
        $order = Order::getId($data['order_id'])->first();
        $pro = Product::proId($order->pro_id)->first();
        $config_biz = [
            'out_trade_no' => $order->order_id,
//            'total_amount' => $order->order_money,
            'total_amount' => '0.01',
            'subject'      => $pro->name,
        ];

        $pay = Pay::alipay($this->config)->web($config_biz);

        return $pay;
    }

    public function return(Request $request)
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！
        $this->data = $data;
        if($data) {
            try {
                DB::transaction(function () {
                    $this->data->total_amount = $this->data->total_amount * 100; //需要删除
                    $order = Order::where('order_id', $this->data->out_trade_no)->first();
                    $doctor = Doctor::with('doc_to_doc_group')->getId($order->doctor_id)->first();
                    $pro = Product::proId($order->pro_id)->first();
                    $doc_goods = number_format($this->data->total_amount, 2) * ($doctor->doc_to_doc_group->ratio / 100);

                    Order::where('order_id', $this->data->out_trade_no)->update([
                        'trade_id' => $this->data->trade_no,
                        'pay_at' => $this->data->timestamp,
                        'pay_status' => 1,
                    ]);

                    DocPay::create([
                        'doctor_id' => $order->doctor_id,
                        'goods' => $doc_goods,
                        'remark' => $pro->name,
                        'operation' => 1,
                    ]);
                    $doctor->increment('goods', $doc_goods);
                });
                return view('auth.page.order_status', ['order' => $this->data, 'status' => 1]);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }else{
            return view('auth.page.order_status',['order' => $this->data,'status' => 0]);
        }
        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }

    public function notify(Request $request)
    {
        Log::info('异步：',['key' => 'value']);

//        $alipay = Pay::alipay($this->config);
//        try{
//            $data = $alipay->verify(); // 是的，验签就这么简单！
//
//            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
//            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
//            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
//            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
//            // 4、验证app_id是否为该商户本身。
//            // 5、其它业务逻辑情况
//
//            Log::debug('Alipay notify', $data->all());
//        } catch (Exception $e) {
//              $e->getMessage();
//        }
//
//        return $alipay->success();// laravel 框架中请直接 `return $alipay->success()`
//
//        echo "success";
    }
}
