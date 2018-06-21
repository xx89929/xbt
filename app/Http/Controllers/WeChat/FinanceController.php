<?php

namespace App\Http\Controllers\Wechat;

use App\Models\PayLog;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceController extends Controller
{
    public function financeList(Request $request){
        if(!$request->get('id')){
            return false;
        }

        $payList = PayLog::where('member_id',$request->get('id'))->get()->each(function ($p){
            $p->goods = number_format($p->goods,2);
        });

        return $payList;
    }
}
