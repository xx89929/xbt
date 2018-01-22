<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SafeController extends Controller
{
    public function index(){
        return view('auth.page.safe');
    }
}
