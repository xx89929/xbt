<?php

namespace App\Http\Controllers\Home;


use App\Traits\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    use Order;
    public function test(){
        $this->orderDoctorSettle();
    }

}
