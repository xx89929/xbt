<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\InitController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends InitController
{
    public function index(){
        return view($this->iView.'.page.contact.index',['headNav' => 'contact']);
    }
}
