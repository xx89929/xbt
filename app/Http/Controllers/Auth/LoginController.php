<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\InitController;
use App\Traits\Sms\sendSms;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class LoginController extends InitController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers,sendSms;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';


    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        $this->pageTitle = '会员登陆';

        return view($this->iView.'.common.login-view',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function phoneLogin(Request $request){
        $this->validateLoginPhone($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLoginResponse($request);
        }

        if($request->session()->get('phoneSmsVerify') == $request->post('phone_code')){
            $user = User::where($request->only('phone'))->first();
            if(!$user){
                return back()->with('error','账号不存在');
            }
            $this->guard()->login($user);
            $request->session()->forget('phoneSmsVerify');
            return redirect()->route('/')->with('success','登陆成功');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    protected function validateLoginPhone(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|string',
            'phone_code' => 'required|string',
        ]);
    }

    protected function attemptLoginPhone(Request $request)
    {

        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }


    protected function credentialsPhone(Request $request)
    {
        return $request->only($this->username());
    }

    public function forgetPassword(Request $request){
        if(!$request->post('phone')){
            return view('home.common.forget_pwd');
        }

        $this->validatetorForgetPwd($request->all())->validate();
        if($request->post('phone_code') == $request->session()->get('phoneSmsVerifyForgetPwd')){
            $request->session()->forget('phoneSmsVerifyForgetPwd');
            $user = User::where($request->only('phone'))->first();
            $user->password = bcrypt($request->post('password'));
            $res = $user->save();
            return $res ?  redirect()->route('login.show')->with('success','重置密码成功') : back()->with('error','重置密码失败');
        }

        return back()->with('error','验证码不正确');
    }

    protected function validatetorForgetPwd(Array $data){
        $messages = [
            'required' => ':attribute 必须填写',
            'max' => ':attribute限制最大:max',
            'min' => ':attribute限制最小:min',
            'confirmed' => '确认:attribute不一致',
            'unique' => '此:attribute已经被占用',
        ];
        return Validator::make($data, [
            'phone' => 'required|string',
            'password' => 'required|string|min:6|max:30|confirmed',
            'phone_code' => 'required|string|max:4'
        ],$messages);
    }


    public function sendForgetPwd(Request $request){
        $phoneNum = $request->get('phone');

        $param['code'] = random_int(1111,9999);
        session(['phoneSmsVerifyForgetPwd' => $param['code']]);

        $content = $this->sendSms($phoneNum,config('sms.SignName'),config('sms.user_forget_pwd_template'),$param);
        return $content->Message;
    }


    public function broker()
    {
        return Password::broker();
    }


    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }


    protected function attemptLogin(Request $request)
    {
        // 验证用户名登录方式
        $usernameLogin = $this->guard()->attempt(
            ['username' => $request->post('username'), 'password' => $request->post('password')], $request->has('remember')
        );
        if ($usernameLogin) {
            return true;
        }

        // 验证手机号登录方式
        $mobileLogin = $this->guard()->attempt(
            ['phone' => $request->post('username'), 'password' =>  $request->post('password')], $request->has('remember')
        );
        if ($mobileLogin) {
            return true;
        }

        return false;
    }
}
