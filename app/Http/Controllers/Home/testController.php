<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class testController extends Controller
{
    public function test(){
        Log::info('test',['testkey' => 'testval']);
    }
}
