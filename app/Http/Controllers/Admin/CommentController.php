<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){
        return view('admin.comment.index',[
            'comments' =>Comment::comList() ?? array()
        ]);
    }

    /**
     * 删除评论
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request){
        $del_id=$request ->id;
        if ($del_id){
            $res=Comment::destroy($del_id);
            if ($res ==1){
                return redirect('admin/comment')->with('tip','删除成功！');
            }else{
                return redirect('admin/comment')->with('tip','删除失败！');
            }
        }
    }
}
