<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){
        return 'comment';
    }
    public function create(Request $request){
        if ($request->isMethod('POST')){
            $data=$request->all();
            $res=Comment::addComment($data);
            return $res;
        }
        return 'create';
    }

    public function create(Request $request){
        if ($request->isMethod('POST')){
            $data=$request->all();
            $res=Comment::addComment($data);
            return $res;
        }
        return 'create';
    }
}
