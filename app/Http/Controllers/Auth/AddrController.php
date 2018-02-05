<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use App\Models\MemberOrAddr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddrController extends Controller
{
    public function index(){
        $myAddr = MemberOrAddr::userID(Auth::id())->first();

        $province = Area::province()->get();
        $city = Area::city()->get();
        $district = Area::district()->get();

        $myAddr ? $myAddr : $myAddr = 'null';
        return view('auth.page.address',['myAddr' => $myAddr,'province' => $province,'city'=> $city,'district' => $district]);
    }


    public function save(Request $request){
//        $data['member_id'] = Auth::id();
//        $data['province'] = $request->post('province');
//        $data['city'] = $request->post('city');
//        $data['district'] = $request->post('district');
//        $data['consignee'] = $request->post('consignee');
//        $data['phone'] = $request->post('phone');
        $res = MemberOrAddr::where('member_id',Auth::id())->update($request->except('_token'));

        return $res ?  back()->with('success','保存成功') : back()->with('error','保存失败');
    }
}
