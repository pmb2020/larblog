<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\MOdels\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $articles=Article::with('Category:id,pid,name')->orderBy('is_top','desc')->orderBy('id','desc')->paginate(3);
//        $articles=Article::with('Category')->find(1);
//        $articles=Category::all();
//        经过foreach之后数据比限定的id,pid,name更多，with失效（原因不明）
        foreach ($articles as &$v){
            if ($v->category->pid!=0){
                $name=Category::select('name')->find($v->category->pid);
                $v->category->name=$name->name;
            }
        }
        return view('index.index',[
            'articles' => $articles
        ]);
    }
    public function ashare(){
        $articles=$this->getArticle(2,2);
        $categorys=Category::where('pid',2)->get();
//        dd($categorys);
        return view('index.ashare',[
            'articles' =>$articles,
            'categorys'=>$categorys,
            'nowId' =>0 //做css标识用
        ]);
    }
    public function ashareType($id){
        $articles=$this->getArticle($id,2);
        $categorys=Category::where('pid',2)->get();
//        dd($articles->toArray());
        return view('index.ashare',[
            'articles' =>$articles,
            'categorys'=>$categorys,
            'nowId' =>$id //做css标识用
        ]);
    }
    public function ajishu(){
        $articles=$this->getArticle(1,2);
        return view('index.ajishu',[
            'articles' =>$articles
        ]);
    }
    public function alife(){
        $articles=$this->getArticle(3,2);
        return view('index.alife',[
            'articles' => $articles
        ]);
    }
    public function apinbo(){
        return view('index.apinbo');
    }
    public function gbook(){
        return view('index.gbook');
    }
    public function about(){
        return view('index.about');
    }

    /**获取文章数据
     * @param $category_id
     * @param $pageNum
     * @return mixed
     */
    public function getArticle($category_id,$pageNum){
        $data=Article::where('category_id',$category_id)->with('Category:id,name')->orderBy('id','desc')->paginate($pageNum);
        return $data;
    }
}
