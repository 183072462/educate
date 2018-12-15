<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PublicController extends Controller
{
    //登录页面展示
    public function login(){

    	return view('admin.public.login');
    }
    //退出登录页面展示
    public function logout(){
        //退出
        Auth::guard('admin')->logout();
        //跳转到登录页面
        return redirect('/admin/public/login');
    }
    //验证登录
    public function check(Request $request){
    	//自动验证
    	$this->validate($request,[
    		//验证规则语法 需要验证的字段名=》[验证规则1:|验证规则2]验证规则
    		//用户名，必填长度介于2-20
    		'username'=>'required|min:2|max:20',
    		//密码，必填，长度6
    		'password'=>'required|min:6',
    		//验证码，必填长度5必填
    		'captcha'=>'required|size:5|captcha'
    		]);
    	//进行身份核实
        $data=$request->only(['username','password']);
        $data['status']=2;//要求状态为开启
        $result=Auth::guard('admin')->attempt($data,$request->get('online'));
    	if($result){
            return redirect('/admin/index/index');
        }else{
            return redirect('/admin/public/login')->withErrors(['loginError'=>'用户名或密码错误']);
        }
    }
}

