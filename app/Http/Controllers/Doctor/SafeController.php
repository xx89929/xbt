<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Bank;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SafeController extends Controller
{

//    use ResetsPasswords;

    public function index(){
        return view('doctor.page.safe');
    }

    public function showRePass(Request $request, $token =null){

        return view('doctor.page.resetPass', ['token' => $token, 'username' => $request->username]);
    }

    public function reset(Request $request){
        if(Auth::guard('doctor')->attempt(['account' => Auth::guard('doctor')->user()->account , 'password' => $request->post('old_password')])){
            $user = Doctor::find(Auth::guard('doctor')->id());
            $user->password = bcrypt($request->post('password'));
            $user->save();
            return redirect()->back()->with('success','密码修改成功');
        }else{
            return redirect()->back()->with(['error' => '原密码不正确']);
        }
    }

    public function bindBank(Request $request){
        if ($data = $request->only(['bank_type','bank_branch','bank_code'])){
            $res  = Doctor::getId(Auth::guard('doctor')->id())->update($data);
            return $res ? back()->with('success','银行绑定成功') : back()->with('error','银行绑定失败');
        }
        $doc = Doctor::select('bank_code','bank_type','bank_branch')->getID(Auth::guard('doctor')->id())->first();
        $bankOp = Bank::all()->pluck('bank_name','bank_id');

        return view('doctor.page.bank',['docInfo' => $doc,'bankOp' => $bankOp]);
    }
}
