<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function index(Request $request){
        $keyword=$request->input('keyword');
        if ($keyword){
        $keywordSql = '%'.implode('%',preg_split("//u", $keyword, -1, PREG_SPLIT_NO_EMPTY)).'%';
//        dd($keywordSql);
//        $results=DB::table('articles')->where('title','like',$keywords)->get();
        $results=Article::where('title','like',$keywordSql)->with('Category:id,name')->orderBy('id','desc')->paginate(10);
        }
        return view('index.search',[
            'articles'=>$results??array(),
            'keyword'=>$keyword
        ]);
    }
}
