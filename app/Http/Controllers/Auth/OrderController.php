<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\InitController;
use App\Http\Requests\orderCreate;
use App\Http\Requests\orderPayShow;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Traits\AliPay;
use App\Traits\WechatPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends InitController
{

    Use AliPay,WechatPay;

    public function index(Request $request){
        $orderNav = null;
        $noPayCount = Order::where('pay_status',0)->where('member_id',Auth::id())->count();
        if ($request->has('pay_status')){
            $order = Order::where($request->only('pay_status'))->where('member_id',Auth::id())->orderInfo()->paginate(10)->withPath('?pay_status=0');
            $orderNav = 'noPayList';
        }else{
            $order = Order::where('member_id',Auth::id())->orderInfo()->orderBy('created_at','desc')->paginate(10);
            $orderNav = 'orderList';
        }
        $this->pageTitle = '订单管理';
        return view($this->authView.'.page.order',['order' => $order,'noPayCount' =>$noPayCount,'orderNav' => $orderNav,'headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function orderPayShow(orderPayShow $request){
        $data = $request->all();
        $res['store'] = Store::where('name',$data['store_id'])->first();
        $res['doctor'] = Doctor::where('realname',$data['doctor_id'])->with('doc_group_sns')->first();
        $res['product'] = Product::ProId($data['pro_id'])->first();
        $this->pageTitle = '购买商品';
        return view($this->authView.'.page.payshow',['res' => $res,'headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function PostOrder(orderCreate $request){
        $data = $request->all();
        //$this->validatorBuyOrder($data)->validate();
        $proPrice = Product::select('id','price','name')->proId($data['pro_id'])->first();
        $data['order_money'] = floatval($proPrice->price)*intval($data['pro_num']);
        $data['price'] = floatval($proPrice->price);
        $data['subject'] = $proPrice->name;
        $order = $this->CreateOrder($data);
        if(!$order->order_id){
            return back()->with('error','生成订单错误');
        }
        switch ($data['pay_way']){
            case 'aliPay':
                return $this->alipay($order);
                break;
            case 'wePay':
                return $this->wechatPay($order);
                break;
            default:
                return back()->with('error','支付方式不正确');
                break;
        }

    }

    protected function CreateOrder(array $data){
        return Order::create([
            'order_id' => time().$data['pro_id'].$data['store_id'],
            'pro_id' => $data['pro_id'],
            'store_id' => $data['store_id'],
            'doctor_id' => $data['doctor_id'],
            'pro_nub' => $data['pro_num'],
            'order_money' => $data['order_money'],
            'member_id' => Auth::id(),
            'price' => $data['price'],
            'take_name' => $data['take_name'],
            'take_phone' => $data['take_phone'],
            'take_address' => $data['take_address'],
            'pay_way'   => $data['pay_way'],
            'subject'   => $data['subject'],
        ]);
    }


    /**
     * 订单查询
     */
    public function searchOrderId(Request $request){
        $data = $request->only('order_id');
        $res = Order::where('order_id',$data['order_id'])->with('relevancy_order_pro')->first();
        return view($this->authView.'.page.order_info',['oInfo' => $res,'headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }


    public function orderStatus(Request $request){
        $status = 1;
        return view('auth.page.order_status',['status' => $status]);
    }


    public function orderRefund(Request $request){
        if($request->only('order_id')){
            $order = Order::getId($request->only('order_id'))->update(['refund' => 1]);
            return $order ? back()->with('success','退款申请成功') : back()->with('error','退款申请失败');
        }
    }
}
