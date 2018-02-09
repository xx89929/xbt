<?php

namespace App\Http\Controllers\Home;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class testController extends Controller
{
    public function test(){
        $gq = Carbon::parse('-7 days')->toDateTimeString();
//        $gq = Carbon::parse('-7 days')->toDateTimeString();
        $order = Order::where('is_lock',0)->first();
        echo $order->created_at;
        dd(Carbon::parse($order->created_at)->addDays(7)->toDateTimeString());exit;
        foreach ($order as $or){
            echo $or->pay_at.'<br />';
        }
        exit;
        dd($order);exit;

    }
}
