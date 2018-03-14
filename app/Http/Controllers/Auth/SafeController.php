<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\InitController;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SafeController extends InitController
{

//    use ResetsPasswords;

    public function index(){
        $this->pageTitle = '账户安全';
        return view($this->authView.'.page.safe',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function showRePass(Request $request, $token =null){

        return view($this->authView.'.page.resetPass', ['token' => $token, 'username' => $request->username]);
    }

    public function reset(Request $request){
        if(Auth::attempt(['username' => Auth::user()->username , 'password' => $request->post('old_password')])){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->post('password'));
            $user->save();
            return redirect()->back()->with('success','密码修改成功');
        }else{
            return redirect()->back()->with(['error' => '原密码不正确']);
        }

    }
}
