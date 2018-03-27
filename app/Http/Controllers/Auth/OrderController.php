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
        $proPrice = Product::select('id','price')->proId($data['pro_id'])->first();
        $data['order_money'] = floatval($proPrice->price)*intval($data['pro_num']);
        $data['price'] = floatval($proPrice->price);
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
        ]);
    }

//    protected function validatorBuyOrder(array $data)
//    {
//        $messages = [
//            'doctor_id.required' => '参数错误',
//            'pro_num.required' => '数量不正确',
//            'store_id.required' => '参数错误',
//            'pro_id.required' => '参数错误',
//            'take_name.required' => '收货人名称必填',
//            'take_phone.required' => '收货人电话必填',
//            'take_address.required' => '收货人地址必填',
//        ];
//        return Validator::make($data, [
//            'pro_id' => 'required|integer',
//            'store_id' => 'required|integer',
//            'doctor_id' => 'required|integer',
//            'pro_num' => 'required|integer',
//            'take_name' => 'required',
//            'take_phone' => 'required',
//            'take_address' => 'required',
//        ],$messages);
//    }

//    protected function validatorPayShow(array $data)
//    {
//        $messages = [
//            'doctor_id.required' => '医生必须选择',
////            'pro_num.required' => '数量必须填写',
//            'store_id.required' => '店铺必须选择',
//            'pro_id.required' => '参数错误',
//        ];
//        return Validator::make($data, [
//            'pro_id' => 'required',
//            'store_id' => 'required',
//            'doctor_id' => 'required',
////            'pro_num' => 'required|integer',
//
//        ],$messages);
//    }

//    public function OrdershowForm(Request $request){
//        if(!$request->get('order_id')){
//            return abort(404);
//        }
//        $orderItem = Order::getId($request->get('order_id'))->first();
//        if($data = $orderItem){
//            $res['member_addr_info'] = MemberOrAddr::userID($data['member_id'])->first();
//            $res['pro'] = Product::proId($data['pro_id'])->select('id','name','pics','price','specification','description')->first();
//            $res['province'] = Area::getId($res['member_addr_info']->province)->select('id','area_name')->first();
//            $res['city'] = Area::getId($res['member_addr_info']->city)->select('id','area_name')->first();
//            $res['district'] = Area::getId($res['member_addr_info']->district)->select('id','area_name')->first();
//            $res['store'] = Store::getId($data['store_id'])->select('id','name','store_pic')->first();
//            $res['doctor'] = Doctor::getId($data['doctor_id'])->select('id','realname')->first();
//            $res['pro_num'] = $data['pro_nub'];
//            $res['order_money'] = $data['order_money'];
//            $res['address'] = $res['member_addr_info']->address;
//            $res['id'] = $data['id'];
//            return view($this->authView.'.page.pro_order_show',['order' => $res]);
//        }else{
//            abort(404);
//        }
//    }


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
