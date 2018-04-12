<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Traits\Sms\sendSms;

class TestController extends Controller {

    use sendSms;

    public function test(){

        $test = $this->sendSms();
        dd($test);exit;
    }
}