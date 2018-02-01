<?php

namespace App\Http\Controllers\Auth;

use App\Models\MemberInfo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use phpDocumentor\Reflection\Types\Integer;

class RegisterController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/news';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        return  $user;
    }

    public function index()
    {
        return view('home.common.reg-view');
    }
}
