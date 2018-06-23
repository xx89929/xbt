<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function orderList(Request $request){
        $id = $request->get('id');
        if(!$id){
            return false;
        }
        $order = Order::where('member_id',$id)->OrderInfo()->paginate(15)->appends(['id' =>  $request->get('id')]);
        foreach($order as $k => $l){
            $l->relevancy_order_pro->pic = env('APP_URL').'/storage/'.$l->relevancy_order_pro->pics[0];
            $l->price = number_format($l->relevancy_order_pro->price,2);
            $l->order_money = number_format($l->order_money,2);
        }
        return $order ? $order :  0;
    }

    public function searchOrder(Request $request){

        $oId = $request->get('id');
        $res = Order::OrderInfo()->find($oId);
        $res->pro_pic = env('APP_URL').'/storage/'.$res->relevancy_order_pro->pics[0];
        $res->order_money = number_format($res->order_money,2);
        return $res ? $res : null;
    }
}
