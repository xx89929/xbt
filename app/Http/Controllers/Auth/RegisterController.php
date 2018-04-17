<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\InitController;
use App\Models\MemberInfo;
use App\Models\MemberOrAddr;
use App\Traits\Sms\sendSms;
use App\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends InitController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers,sendSms;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {

        parent::__construct($request);

        $this->middleware('guest:doctor');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'required' => ':attribute 必须填写',
            'max' => ':attribute限制最大:max',
            'min' => ':attribute限制最小:min',
            'confirmed' => '确认:attribute不一致',
            'unique' => '此:attribute已经被占用',
        ];
        return Validator::make($data, [
            'username' => 'required|string|max:30|min:6|unique:users',
            'password' => 'required|string|min:6|max:30',
            'phone_code' => 'required|string|max:4|min:4'
        ],$messages);

    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if(! $this->verifyPhoneCode($request)){
            return back()->with('error','手机验证码不正确');
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect()->route('login.show')->with('success','注册成功');
    }


    public function sendRegUserSms(Request $request){

        $phoneNum = $request->get('phone');

        $param['code'] = random_int(1111,9999);
        session(['phoneSmsVerify' => $param['code']]);

        $content = $this->sendSms($phoneNum,config('sms.SignName'),config('sms.user_register_template'),$param);
        return $content->Message;
    }


    public function phoneRegUsr(Request $request){
        if($request->session()->get('phoneSmsVerify') != $request->post('phone_code')){
            return back()->with('error','手机验证码不正确');
        }
        $this->validatorPhone($request->all())->validate();
        event(new Registered($user = $this->createPhone($request->all())));
        $this->guard()->login($user);

        $request->session()->forget('phoneSmsVerify');

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }



    protected function validatorPhone(array $data)
    {
        $messages = [
            'required' => ':attribute 必须填写',
            'max' => ':attribute限制最大:max',
            'min' => ':attribute限制最小:min',
            'unique' => '此:attribute已经被占用',
        ];
        return Validator::make($data, [
            'username' => 'required|string|max:30|min:6|unique:users',
        ],$messages);

    }


    protected function verifyPhoneCode(Request $request){
        if($request->session()->get('phoneSmsVerify') != $request->post('phone_code')){
            return false;
        }else{
            $request->session()->forget('phoneSmsVerify');
            return true;
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        return User::create([
//            'username' => $data['username'],
//            'password' => bcrypt($data['password']),
//        ]);

        $user = User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'phone' => $data['username'],
        ]);

        MemberInfo::create([
            'member_id' => intval($user->id),
        ]);

        MemberOrAddr::create([
            'member_id' => intval($user->id),
        ]);
        return  $user;
    }


    protected function createPhone(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'phone' => $data['username'],
        ]);

        MemberInfo::create([
            'member_id' => intval($user->id),
        ]);

        MemberOrAddr::create([
            'member_id' => intval($user->id),
        ]);
        return  $user;
    }

    public function index()
    {
        $this->pageTitle = '会员注册';
        return view($this->iView.'.common.reg-view',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function phoneReg(){
        $this->pageTitle = '手机注册';
        return view($this->iView.'.common.phone_reg-view',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }


    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return redirect()->route('login.show')->with('success',"$user->username 注册成功");
    }
}
