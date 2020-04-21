<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //
    public function mail(){
//        邮件发送测试
        $mailData=[
            'name' => '哆啦网',
            'content'=>'XXX评论了你的文章'
        ];
        Mail::to('819123980@qq.com')->send(new TestMail($mailData));
//        dump(getenv());
        return 'email';
    }
    public function index(){
        return 'comment';
    }
    public function create(Request $request){
        if ($request->isMethod('POST')){
            $data=$request->all();
            $res=Comment::addComment($data);

            $mailData=[
                'name' => $data['username'],
                'content'=>$data['content']
            ];
            Mail::to('819123980@qq.com')->send(new TestMail($mailData));
            return $res;
        }
        return 'create';
    }

}
