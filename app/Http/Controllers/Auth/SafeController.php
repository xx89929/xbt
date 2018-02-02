<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SafeController extends Controller
{

//    use ResetsPasswords;

    public function index(){
        return view('auth.page.safe');
    }

    public function showRePass(Request $request, $token =null){

        return view('auth.page.resetPass', ['token' => $token, 'username' => $request->username]);
    }

    public function reset(Request $request){
        if(Auth::attempt(['username' => Auth::user()->username , 'password' => $request->post('old_password')])){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->post('password'));
            $user->save();
            return redirect()->back()->with('status','修改成功');
        }else{
            return redirect()->back()->withErrors(['old_password' => '原密码不正确']);
        }

    }
}
