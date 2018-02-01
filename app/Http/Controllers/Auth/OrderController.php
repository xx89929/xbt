<?php

namespace App\Http\Controllers\Auth;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(){
        return view('auth.page.order');
    }

    public function PostOrder(Request $request){
        $data = $request->all();
        $this->validator($data)->validate();
        $proPrice = Product::select('id','price')->proId($data['pro_id'])->first();
        $data['order_money'] = floatval($proPrice->price)*intval($data['pro_num']);
        $data['price'] = floatval($proPrice->price);
        $this->CreateOrder($data);
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
}
