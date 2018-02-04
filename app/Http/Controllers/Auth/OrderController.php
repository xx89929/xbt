<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use App\Models\Doctor;
use App\Models\MemberOrAddr;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(){
        $order = Order::where('member_id',Auth::id())->with(['relevancy_order_pro' => function($query){
            $query->select('id','name');
        },'relevancy_order_user' => function($query){
            $query->select('id','username');
        },'rele_order_doctor' => function($query){
            $query->select('id','realname');
        },'rele_order_store' => function($query){
            $query->select('id','name');
        }])->get();
        return view('auth.page.order',['order' => $order]);
    }

    public function PostOrder(Request $request){
        $data = $request->all();
        $this->validator($data)->validate();
        $proPrice = Product::select('id','price')->proId($data['pro_id'])->first();
        $data['order_money'] = floatval($proPrice->price)*intval($data['pro_num']);
        $data['price'] = floatval($proPrice->price);
        $order = $this->CreateOrder($data);
        return $order->id ? redirect()->route('order.showf',['order_id' => $order]) : back()->withErrors('status','异常!请联系官网客服');
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
        ]);
    }

    protected function validator(array $data)
    {
        $messages = [
            'doctor_id.required' => '医生必须选择',
            'pro_num.required' => '数量必须填写',
            'store_id.required' => '店铺必须选择',
        ];
        return Validator::make($data, [
            'pro_id' => 'required|integer',
            'store_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'pro_num' => 'required|integer',

        ],$messages);
    }

    public function OrdershowForm(Request $request){
        if(!$request->get('order_id')){
            return abort(404);
        }
        $orderItem = Order::getId($request->get('order_id'))->first();
        if($data = $orderItem){
            $res['member_addr_info'] = MemberOrAddr::userID($data['member_id'])->first();
            $res['pro'] = Product::proId($data['pro_id'])->select('id','name','pics','price','specification','description')->first();
            $res['province'] = Area::getId($res['member_addr_info']->province)->select('id','area_name')->first();
            $res['city'] = Area::getId($res['member_addr_info']->city)->select('id','area_name')->first();
            $res['district'] = Area::getId($res['member_addr_info']->district)->select('id','area_name')->first();
            $res['store'] = Store::getId($data['store_id'])->select('id','name','store_pic')->first();
            $res['doctor'] = Doctor::getId($data['doctor_id'])->select('id','realname')->first();
            $res['pro_num'] = $data['pro_nub'];
            $res['order_money'] = $data['order_money'];
            $res['address'] = $res['member_addr_info']->address;
            $res['id'] = $data['id'];
            return view('auth.page.pro_order_show',['order' => $res]);
        }else{
            abort(404);
        }
    }


    public function orderStatus(Request $request){
        $status = 1;
        return view('auth.page.order_status',['status' => $status]);
    }
}
