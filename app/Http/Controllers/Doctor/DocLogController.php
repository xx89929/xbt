<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\InitController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DocLogController extends InitController
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function index(){
        $this->pageTitle = '医师登陆';
        return view($this->iView.'.common.doclog',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }


    public function username()
    {
        return 'account';
    }



    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('guest:doctor')->except('logout');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt([$this->username() => $request->post($this->username()),
            'password' =>$request->post('password'),'is_check' => 1]);
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
            'is_check' => [trans('auth.is_check')]
        ]);
    }


    /**
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('doctor');
    }


    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }


}
