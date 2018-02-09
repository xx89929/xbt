<?php

namespace App\Http\Controllers\Doctor;

use App\Models\DocPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    public function index(){
        $pay = DocPay::with('docpay_payset')->where('doctor_id',Auth::guard('doctor')->id())->get();
        return view('doctor.page.finace',['payList' => $pay]);
    }
}
