<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\InitController;
use App\Models\MemberInfo;
use App\Models\MemberOrAddr;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends InitController
{
    protected $redirectTo = '/news';
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

    use RegistersUsers;

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
            'password' => 'required|string|min:6|max:30|confirmed',
        ],$messages);

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
}
