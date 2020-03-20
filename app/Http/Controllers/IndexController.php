<?php

namespace App\Http\Controllers;

use App\Http\Models\wangbo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function test(){
        return '我是IndexController控制器下的test方法哦';
    }

    public function dbtest(){
        $users = DB::select('select * from users');
        dd($users);
        return 'db';
    }
    //model测试方法
    public function modeltest(){
       $res= wangbo::all()->toArray();
//       dd($res);
//        foreach ($res as $res) {
//            echo $res->title;
//        }
        $wq=new wangbo();
        $tss=$wq->test();
        dd($tss);
    }

}
