<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\InitController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends InitController
{
    public function index(){
        echo '医生首页';
    }
}
