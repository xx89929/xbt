<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WangEditController extends Controller
{
    public function imgUp(Request $request){
        if($request->file('wang_editor_file')){
            $path = $request->file('wang_editor_file')->store('public/wangEdit');
            $url = env('APP_URL').Storage::url($path);
            $res = [
                'errno' => 0,
                'data' => [$url],
            ];
            return $res;
        }else{
            $res = [
                'errno' => 1,
                'data' => [2],
            ];
            return $res;
        }
    }
}
