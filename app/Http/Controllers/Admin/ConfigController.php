<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    //
    public function index(){
        $configs=DB::table('configs')->get();
        foreach ($configs as $v){
            $config[$v->name]=$v->value;
        }
        return view('admin.config.index',[
            'config'=>$config
        ]);
    }
//    配置信息保存
    public function saveConfig(Request $request){
        if ($request -> isMethod('post')){
            $data=$request->all();
            $arr=array();
            foreach ($data as $k =>$v){
                array_push($arr,['name'=>$k,'value'=>$v]);
            }
            unset($arr[0]);
            foreach ($arr as $k=>$v){
                DB::table('configs')->where('name',$v['name'])->update(['value'=>$v['value']??'']);
            }
            return redirect()->back()->with('tip','保存成功！');
        }
    }
    public function saveConfig1(Request $request){
        if ($request -> isMethod('post')){
            $data=$request->all();
            $arr=array();
            foreach ($data as $k =>$v){
                echo $k;
                array_push($arr,['name'=>$k,'value'=>$v]);
            }
            unset($arr[0]);
            $ttt=[
                ['name'=>'asa','value'=>'埃及'],
                ['name'=>'ss','value'=>'啊飒飒']
            ];
            $res=DB::table('configs')->insert($arr);
            dd($res);
            return 'post';
        }
        return 'no post';
    }
}
