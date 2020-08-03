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
        header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
//        header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
        if ($request->isMethod('POST')){
            $data=$request->all();
//            dd($data);
            $res=Comment::addComment($data);

            $mailData=[
                'name' => $data['username'],
                'content'=>$data['content'],
                'url' =>'http://www.gold404.cn/info/'.$data['article_id']
            ];
            Mail::to('819123980@qq.com')->send(new TestMail($mailData));
            return $res;
        }
        return 'create';
    }

    public function getCommentData($id){
        header('Content-Type:application/json;charset=utf-8;');
        header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
//        header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型

        return json_encode(Comment::getComment($id));
    }

}
