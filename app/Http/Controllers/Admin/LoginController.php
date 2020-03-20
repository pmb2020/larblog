<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(){
        return view('admin.login.index');
    }
    public function checkLogin(Request $request){
        if ($request -> isMethod('POST')){
            $data=$request->all();
            if ($data['username']=='wangbo' && $data['password']=='123456'){
                session(['user_name' => $data['username']]);
                return redirect('admin/index')->with('tip','欢迎您回来！');
            }else{
                return redirect('admin/login')->with('tip','账号或密码错误！');
            }
        }
    }

    public function loginOut(Request $request){
        $request->session()->forget('user_name');
        return redirect('admin/login')->with('tip','退出成功！');
    }
}
