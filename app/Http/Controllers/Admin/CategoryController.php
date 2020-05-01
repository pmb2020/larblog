<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data=Category::all();
//        dd($data->toArray());
        return view('admin.category.index',[
            'categories' =>$data
        ]);
    }
    /**
     * 获取分类信息，暂时做接口用
     * @param $pid
     * @return array
     */
    public function getChildCategory($pid){
        $data=Category::where('pid',$pid)->select('id','name')->get();
        $respose=[
            'code' => 200,
            'msg' => 'success',
            'data' => $data
        ];
        return $respose;

    }
}
