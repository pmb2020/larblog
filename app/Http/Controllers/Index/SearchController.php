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
//        $results=DB::select('select * from ml_articles where id=?',[1]);
//        $results=DB::table('articles')->where('title','like',$keywords)->get();
        $results=Article::where('title','like','%'.$keyword.'%')->with('Category:id,name')->orderBy('id','desc')->paginate(10);
        return view('index.search',[
            'articles'=>$results,
            'keyword'=>$keyword
        ]);
    }
}
