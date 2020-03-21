<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\MOdels\Category;
use Illuminate\Http\Request;
use Psy\Util\Str;


class ArticleController extends Controller
{
    //文章列表
    public function index()
    {
        $articles= Article::orderBy('id','desc')->paginate(5);
        return view('admin.article.index',[
            'articles' => $articles
        ]);
    }

    //  文章内图片上传
    public function imagesUpload(Request $request){
        return $this->uploadImg($request,'uploads/images/'.date('Ymd'));
    }
    //  封面图上传
    public function coverUpload(Request $request){
        return $this->uploadImg($request,'uploads/covers');
    }
    //    添加文章
    public function create(Request $request)
    {
        if ($request -> isMethod('POST')){
            $data=$request -> all();
            $data=$this->getDesc($data,220);
//            dd($data);
            if (Article::create($data)){
                return redirect('admin/article/index')->with('tip','添加成功！');
            }else{
                return redirect()->back();
            }
        }

        $Categorys=Category::where('pid',0)->select('id','name')->get();
//        dd($Categorys);
        return view('admin.article.create',[
            'Categorys'=>$Categorys
        ]);
    }
    //删除文章
    public function delete($id){
        $article=Article::find($id);
        if ($article->delete()){
            return redirect('admin/article/index')->with('tip','删除成功！');
        }else{
            return redirect('admin/article/index')->with('tip','删除失败！');
        }
    }
    //上传图片
    public function uploadImg($request,$path){
//        $image=$_FILES['file'];
        if ($request->isMethod('POST')){
            if (!is_dir('uploads')){
                mkdir('uploads',755);
            }
            $file = $request->file('file');
            $rule = ['jpg', 'png', 'gif','bmp','jpeg'];
            if ($file->isValid()){
                $entension=$file -> getClientOriginalExtension();//扩展名
                if (!in_array($entension, $rule)) {
                    $msg='图片格式为jpg,png,gif,bmp,jpeg';
                }else{
                    $fileName = uniqid() . '.' . $entension;
                    $file -> move($path, $fileName);
                    $path= '/' . $path . '/'. $fileName;
                }
            }
        }
        $arr=[
            'success' => true,
            'msg' => $msg ?? 'success',
            'file_path' => $path
        ];
        echo json_encode($arr);
    }

    /**
     * 获取文章摘要（或描述）
     * @param $data
     * @param $length
     * @return mixed
     */
    public function getDesc($data,$length){
        if (!$data['description']){
            if (mb_strlen($data['content'])< $length){
                $data['description']=strip_tags($data['content']);
            }else{
                $data['description']=\Illuminate\Support\Str::limit(strip_tags($data['content']),$length,'');
            }
        }
        return $data;
    }

}
