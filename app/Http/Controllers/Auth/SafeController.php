<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\InitController;
use App\Mail\OrderShipped;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SafeController extends InitController
{

//    use ResetsPasswords;

    public function index(){
        $this->pageTitle = '账户安全';
        $email = User::where('id',Auth::id())->select('email')->first();
        return view($this->authView.'.page.safe',['headNav' => 'auth','pageTitle' => $this->pageTitle,'email' => $email]);
    }

    public function showRePass(Request $request, $token =null){

        return view($this->authView.'.page.resetPass', ['token' => $token, 'username' => $request->username]);
    }

    public function showBindEmail(){
        $email = User::where('id',Auth::id())->select('email')->first();
        return view($this->authView.'.page.bind_email',['email' => $email]);
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

    public function bindEmail(Request $request){
        if(!$request->post('email')){
            return back()->with('error','请填写邮箱');
        }
        Mail::to($request->post('email'))->send(new OrderShipped($request));
        return back()->with('success','邮箱已发送！请注意查收');
    }

    public function verifyBindEmail(Request $request){
        if(Auth::id() == $request->get('userId')){
            $user = User::find(Auth::id());
            $user->email = $request->get('email');
            $res = $user->save();
            return $res ? redirect()->route('member.safe')->with('success','绑定邮箱成功') : redirect()->route('member.safe')->with('error','绑定邮箱失败');
        }else{
            return redirect()->route('/')->with('error','您的绑定邮箱已过期');
        }
    }
}
