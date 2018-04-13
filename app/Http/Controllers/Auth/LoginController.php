<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\InitController;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

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
        
    }

}
