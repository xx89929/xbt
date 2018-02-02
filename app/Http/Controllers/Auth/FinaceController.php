<?php

namespace App\Http\Controllers\Auth;

use App\Models\Order;
use App\Models\PayLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinaceController extends Controller
{
    public function index(){
        $nonPay = Order::select('id')->nonPay()->where('member_id',Auth::id())->count();
        $orderNon = Order::select('id')->nonOrder()->where('member_id',Auth::id())->count();
        $payList = PayLog::where('member_id',Auth::id())->with('pay_log_options')->get();
        return view('auth.page.finace',['orderNon' => $orderNon,'nonPay' => $nonPay,'payList' => $payList]);
    }
}
