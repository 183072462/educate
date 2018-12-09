<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    //登录页面展示
    public function login(){
    		return view('admin.public.login');
    }
}

