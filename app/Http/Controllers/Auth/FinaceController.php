<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\InitController;
use App\Models\Order;
use App\Models\PayLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinaceController extends InitController
{
    public function index(){
        $nonPay = Order::select('id')->nonPay()->where('member_id',Auth::id())->count();
        $orderNon = Order::select('id')->nonOrder()->where('member_id',Auth::id())->count();
        $payList = PayLog::where('member_id',Auth::id())->with('pay_log_options')->get();
        return view($this->authView.'.page.finace',['orderNon' => $orderNon,'nonPay' => $nonPay,'payList' => $payList]);
    }
}
