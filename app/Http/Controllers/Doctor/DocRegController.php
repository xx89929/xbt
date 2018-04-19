<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\InitController;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class DocRegController extends InitController
{
    use RegistersUsers;



    /**
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->pageTitle = '医师注册';
        return view($this->iView.'.common.docreg',['headNav' => 'auth','pageTitle' => $this->pageTitle]);
    }

    public function username()
    {
        return 'account';
    }


    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('guest:doctor');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($doctor = $this->create($request->all())));

        $this->guard()->login($doctor);

        return $this->registered($request, $doctor)
            ?: redirect($this->redirectPath());
    }


    protected function create(array $data)
    {

        return Doctor::create([
            'account' => $data['account'],
            'realname' => $data['realname'],
            'password' => bcrypt($data['password']),
        ]);
    }


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
            'account' => 'required|string|max:30|min:6|unique:doctors',
            'realname' => 'required',
            'password' => 'required|string|min:6|max:30|confirmed',
        ],$messages);

    }

    protected $redirectTo = '/';

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('doctor');
    }
}
