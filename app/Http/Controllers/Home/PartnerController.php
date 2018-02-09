<?php

namespace App\Http\Controllers\Home;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function index(){
        return view('home.page.partner.index',['headNav' => 'partner']);
    }

    public function CreateForm(Request $request){
        $data = $request->only('name','phone','des');
        $res = Partner::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'des' => $data['des'],
        ]);
        return $res->id ? back()->with('success','加盟成功') : back()->with('error','加盟失败');
    }
}
