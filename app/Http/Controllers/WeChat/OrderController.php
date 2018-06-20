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
        $order = Order::where('member_id',$id)->OrderInfo()->simplePaginate(15)->each(function ($o){
            $o->relevancy_order_pro->pic = env('APP_URL').'/storage/'.$o->relevancy_order_pro->pics[0];
            $o->relevancy_order_pro->price = number_format($o->relevancy_order_pro->price,2);
            $o->order_money = number_format($o->order_money,2);
        });
        return $order;

    }
}
