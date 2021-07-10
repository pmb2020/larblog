<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\MOdels\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class InfoController extends Controller
{
    //
    public function index($id){
//        阅读量先+1
        Article::where('id',$id)->increment('read_num');
//        $infoData=Article::where('articles.id',$id)
//            ->select('articles.id','articles.title','articles.keywords','articles.description',
//                'articles.content','articles.read_num','articles.is_top',
//                'articles.created_at','categories.name')
//            ->leftJoin('categories','articles.category_id','=','categories.id')->
//            first();
        $infoData=Article::where('id',$id)->with('Category:id,pid,name,slug')->first();
        $prev_article = Article::where('id','<',$id)->select('id','title')->orderBy('id','desc')->first();
        $next_article = Article::where('id','>',$id)->select('id','title')->orderBy('id','asc')->first();
        $comments=Comment::where([
            'article_id'=>1
        ])->get()->toArray();
//        第一种，直接在sql种获取所需数据格式（暂时未使用）
        $sql='SELECT com.username,com.content,com.created_at time,com.zan_num, GROUP_CONCAT(CONCAT(\'{"username":"\',rep.username, \'","replay_name":"\',com.username,\'","content":"\',rep.content,\'","time":"\',rep.created_at,\'","zan_num":"\',rep.zan_num,\'"}\')) AS replayData FROM ml_comments com LEFT  JOIN ml_comments rep ON com.id=rep.replay_id WHERE com.replay_id=0 AND com.article_id=1 GROUP BY com.id';
        $data= array_map('get_object_vars', DB::select($sql));
        foreach ($data as &$v){
            $temp='['.$v['replayData'].']';
            unset($v['replayData']);
            $v['replayData']=json_decode($temp,true);
        }
//        return Comment::getComFromModel($id);
        return view('index.info1',[
            'infoData' => empty($infoData) ? array() : $infoData->toArray(),
            'prev_article'=>$prev_article,
            'next_article'=>$next_article,
            'comments'=>Comment::getComFromModel($id)
        ]);
    }
}
