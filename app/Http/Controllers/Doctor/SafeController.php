<?php

namespace App\Http\Controllers\Doctor;

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
}
