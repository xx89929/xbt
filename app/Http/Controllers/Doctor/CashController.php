<?php

namespace App\Http\Controllers\Doctor;

use App\Models\DocCash;
use App\Models\DocPay;
use App\Traits\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    use Doctor;
    public function index(){
        $pay = DocPay::with('docpay_payset')->where('doctor_id',Auth::guard('doctor')->id())->paginate(10);
        return view('doctor.page.finace',['payList' => $pay]);
    }

    public function getCashList(){
        $CL = DocCash::where('doctor_id',Auth::guard('doctor')->id())->orderBy('created_at','desc')->paginate(10);
        return view('doctor.page.cash_list',['cashList' => $CL]);
    }

    public function setCash(Request $request){
        if ($request->filled('goods')){
            $cashGoods = doubleval($request->post('goods'));
            $vBI = $this->valiDocBankInfo(Auth::guard('doctor')->id());
            if ($vBI == 0){
                return redirect()->route('doc.bind.bank')->with('error','请完善银行信息');
            }
            $docGoods = $this->getDocGoods(Auth::guard('doctor')->id());
            if($cashGoods > $docGoods){
                return back()->with('error','您申请提现金额超过了您的余额');
            }
            $applyRes = $this->applyCash(Auth::guard('doctor')->id(),$cashGoods);
            return $applyRes == 1 ? back()->with('success','提现申请成功，稍后请查收您的账户') : back()->with('error','提现申请失败，请联系官方客服！');
        }
    }
}
