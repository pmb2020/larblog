<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\MOdels\Category;
use Illuminate\Http\Request;

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
        return view('index.info',[
            'infoData' => $infoData,
            'prev_article'=>$prev_article,
            'next_article'=>$next_article
        ]);
    }
}
