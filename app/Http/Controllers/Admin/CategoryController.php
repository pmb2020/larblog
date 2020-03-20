<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MOdels\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
